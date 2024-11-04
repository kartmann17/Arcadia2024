<?php

namespace App\Controllers;

use App\Models\AvisModel;

class AvisController extends MainController
{

    // ajout des avis en base de données depuis le formulaire de la page d'accueil
    public function ajoutAvis()
    {
        // Vérifier si un avis a déjà été laissé récemment
        if (isset($_COOKIE['avis_recent'])) {
            $_SESSION['error_message'] = "Vous avez déjà laissé un avis récemment.";
            header("Location: /main");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $etoiles = filter_var($_POST['etoiles'] ?? '', FILTER_SANITIZE_NUMBER_INT);
            $nom = htmlspecialchars(trim($_POST['nom']), ENT_QUOTES, 'UTF-8');
            $commentaire = htmlspecialchars(trim($_POST['commentaire']), ENT_QUOTES, 'UTF-8');
            $date = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');

            // Vérification de la validité de la date du jour
            if(strtotime($date) > strtotime(date('Y-m-d'))) {
                $_SESSION['error_message'] = "La date de visite ne peut pas etre supérieur à la date du jour.";
            }

            // Vérification que tous les champs son remplis
            if (!empty($etoiles) && !empty($nom) && !empty($commentaire)) {
                $AvisModel = new AvisModel();
                $result = $AvisModel->saveAvis($etoiles, $nom, $commentaire, $date);

                if ($result) {

                    setcookie('avis_recent', true, time() + 86400, "/");
                    $_SESSION['success_message'] = "Votre avis a été soumis avec succès.";
                } else {
                    $_SESSION['error_message'] = "Une erreur s'est produite lors de l'enregistrement de votre avis. Veuillez réessayer.";
                }
            } else {
                $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
            }

            header("Location: /main");
            exit();
        }
    }
}
