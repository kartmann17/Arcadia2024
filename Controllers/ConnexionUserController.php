<?php

namespace App\Controllers;

use App\Models\ConnexionUserModel;

class ConnexionUserController extends Controller
{
    public function index()
    {

        $this->render('connexion/index');
    }


    public function connexion()
    {
        //verification de la methode en post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //nettoyage des entrées utilisateurs
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';

            //validation de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email non valide";
                exit();
            }

            //préparation de la requette pour retouver l'email des utilsateurs
            $ConnexionUserModel = new ConnexionUserModel();
            $user = $ConnexionUserModel->recherche($email);

            // Vérification du mot de passe
            if ($user && password_verify($pass, $user->pass)) {

                //regénération de l'id de session
                session_regenerate_id(true);

                // Stockage des informations  dans la session
                $_SESSION['id_User'] = $user->id;
                $_SESSION['nom'] = htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8');
                $_SESSION['prenom'] = htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8');
                $_SESSION['role'] = htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8');

                //On regénère le token pour la sécurisation des futurs entrées (vétérinaire, employé)
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                // Redirection vers la page du dashboard
                header("Location: /dash");
                exit();
            } else {
                $_SESSION['error_message'] = "Email ou mot de passe incorrect";
                header("Location:/ConnexionUser");
                exit();
            }
        }
    }

    public function deconnexion()
    {
        session_unset();
        // Redirection page d'accueil
        header("Location: /");
        exit();
    }
}
