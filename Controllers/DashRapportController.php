<?php

namespace App\Controllers;

use App\Models\RapportModel;
use App\Models\AnimauxModel;
use App\Models\UserModel;


class DashRapportController extends DashController
{
    // affichage de la liste des rapports
    public function liste()
    {
        $RapportModel = new RapportModel();
        $rapports = $RapportModel->findAll();
        if (isset($_SESSION['id_User'])) {
            $title = "Liste Rapports";
            $this->render(
                'dash/listerapport',
                [
                    'rapports' => $rapports,
                    'title' => $title
                ]
            );
        } else {
            http_response_code(404);
        }
    }

    // ajout d'un rapport
    public function ajoutRapport()
{
    if (!isset($_SESSION['id_User'])) {
        $_SESSION['error_message'] = "Vous devez être connecté pour ajouter un rapport.";
        header("Location: /login");
        exit;
    }

    if (!in_array($_SESSION['role'], ['admin', 'vétérinaire', 'employé'])) {
        $_SESSION['error_message'] = "Vous n'avez pas les droits pour ajouter un rapport.";
        header("Location: /login");
        exit;
    }

    $AnimauxModels = new AnimauxModel();
    $animaux = $AnimauxModels->findAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'] ?? '';
        $date = $_POST['date'] ?? '';
        $status = $_POST['status'] ?? '';
        $nourriture_reco = $_POST['nourriture_reco'] ?? '';
        $grammage_reco = $_POST['grammage_reco'] ?? '';
        $sante = $_POST['sante'] ?? '';
        $repas_donnees = $_POST['repas_donnees'] ?? '';
        $quantite = $_POST['quantite'] ?? '';
        $commentaire = $_POST['commentaire'] ?? '';
        $id_User = $_SESSION['id_User'];
        $id_animal = $_POST['id_animal'] ?? '';



        // Vérification que le champ 'sante' est entre 0 et 10
        if ($sante < 0 || $sante > 10) {
            $_SESSION['error_message'] = "La santé de l'animal doit être entre 0 et 10.";
            return $this->render('dash/addrapport', ['animaux' => $animaux]);
        }

        // Appel du modèle pour enregistrer le rapport
        $RapportModel = new RapportModel();
        $result = $RapportModel->saveRapport($nom, $date, $status, $nourriture_reco, $grammage_reco, $sante, $repas_donnees, $quantite, $commentaire, $id_User, $id_animal);

        if ($result) {
            $_SESSION['success_message'] = "Rapport ajouté avec succès.";
            header("Location: /DashRapport/liste");
            exit;
        } else {
            $_SESSION['error_message'] = "Erreur lors de l'ajout du rapport.";
            return $this->render('dash/addrapport', ['animaux' => $animaux]);
        }
    }
}

    //mise a jour d'un rapport
    public function updateRapport($id)
    {

        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();


        $RapportModel = new RapportModel();
        $rapport = $RapportModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $RapportModel->hydrate($_POST);

            if ($RapportModel->update($id)) {
                $_SESSION["success_message"] = "Rapport modifié avec succès.";
            } else {
                $_SESSION["error_message"] = "Erreur lors de la modification.";
            }
            // Redirection après le traitement
            header("Location: /DashRapport/liste");
            exit;
        }
        $this->render('dash/updaterapport', [
            'animaux' => $animaux,
            'rapport' => $rapport
        ]);
    }


    // suppression d'un raport
    public function deleteRapport()
    {
        if (!in_array($_SESSION['role'], ['vétérinaire'])) {
            $_SESSION['error_message'] = "Vous n'avez pas les droits pour supprimer ce rapport.";
            header("Location: /DashRapport/liste");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $RapportModel = new RapportModel();

                $result = $RapportModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "Le rapport a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression du rapport.";
                }
            }
            // Redirection vers la dashboard
            header("Location: /DashRapport/liste");
            exit();
        }
    }

    // affichage de la page ajout rapport
    public function index()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $RapportModel = new RapportModel();
        $rapport = $RapportModel->findAll();
        if (isset($_SESSION['id_User'])) {
            // Affichage de la page des rapports
            $this->render("dash/addrapport", compact('animaux', 'rapport'));
        } else {
            http_response_code(404);
        }
    }
}
