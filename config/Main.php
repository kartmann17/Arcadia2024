<?php

namespace App\config;

use App\Controllers\MainController;

class Main
{
    public function start()
    {
        session_start();

        //génération d'un token CSRF si il n'existe pas
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        // on récupére l'url
        $uri = $_SERVER['REQUEST_URI'];

        //on verifie que uri n'est pas vide et se termine par un /
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            // On enlève le /
            $uri = substr($uri, 0, -1);

            // envoi un code de redirection permanent
            http_response_code(301);

            // on redirige vers l'url sans /
            header('Location: ' . $uri);
        }

        //verification du jeton CSRF et assainit données POST si la requete est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $csrfToken = $_POST['csrf_token'] ?? '';
            $this->chekCsrfToken($csrfToken);

            //Assainissement des données en POST
            $_POST = $this->sanitizeFormData($_POST);
        }

        // gestion des paramètre d'URL
        //p=controleur/methode/paramètres
        //séparation des paramètres dans un tableau
        $params = isset($_GET['p']) ? explode('/', filter_var($_GET['p'], FILTER_SANITIZE_URL)) : [];

        // var_dump($params);
        if (isset($params[0]) && $params[0] != '') {
            //récupération du controleur a instancier
            //mettre une majuscule en 1 er lettre et ajout du namespace complet avant et ajout du "controller" après
            $controllerName = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';

            if (class_exists($controllerName)) {
                // instenciation du controleur
                $controller = new $controllerName();
            } else {
                $this->error404("Controler non trouvé : $controllerName");
                return;
            }

            //récupération du 2 eme paramètre d'url
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            if (method_exists($controller, $action)) {
                // si il reste des paramètres on les passe à la méthode
                call_user_func_array([$controller, $action], $params);
            } else {
                $this->error404("Méthode non trouvée : $action");
                return;
            }
        } else {
            //on instencie le controleur par defaut car pas de paramètre
            $controller = new MainController();

            // appel de la methode index
            $controller->index();
        }
    }

    public function chekCsrfToken($token)
    {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            http_response_code(403);
            echo "CSRF Tokken ivalide";
            exit();
        }
    }

    private function sanitizeFormData(array $data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {

            //assainit si la valeur esr un tableau
            if (is_array($value)) {
                $sanitizedData[$key] = $this->sanitizeFormData($value);
            } else {
                //apllication d'un strip_tag aux chaine de caractère uniqueent
                if (is_string($value)) {
                    $sanitizedData[$key] = strip_tags($value);
                } else {
                    //valeur par défaut si ce n'est pas une chaine de caractère
                    $sanitizedData[$key] = $value;
                }
            }
        }
        return $sanitizedData;
    }

    private function error404($message = "La page que vous recherchez n'existe pas.")
    {
        http_response_code(404);
        require_once __DIR__ . '/../Views/404.php';
        exit();
    }
}

