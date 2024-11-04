<?php

namespace App\Controllers;

use App\Models\HorairesModel;


class DashHorairesController extends Controller
{
    private $HorairesModel;

    public function __construct()
    {
        $this->HorairesModel = new HorairesModel;
    }

    public function liste()
    {
        $horaires = $this->HorairesModel->getAllHoraires();
        if (isset($_SESSION['id_User'])) {
            $title = "Liste Horaires";
            $this->render(
                'dash/listehoraires',
                [
                    'horaires' => $horaires,
                    'title' => $title
                ]
            );
        } else {
            http_response_code(404);
        }
    }

    public function addHoraire()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id_User'])) {
            $jour = $_POST['jour'];
            $ouverture = $_POST['ouverture'];
            $fermeture = $_POST['fermeture'];

            $this->HorairesModel->ajouterHoraire($jour, $ouverture, $fermeture);

            header("Location: /dash");
            exit;
        }

        $title = "Ajouter un Horaire";
        $this->render('dash/addhoraire', ['title' => $title]);
    }

    public function updateHoraire($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jour = $_POST['jour'];
            $ouverture = $_POST['ouverture'];
            $fermeture = $_POST['fermeture'];

            // Appel de la méthode
            $result = $this->HorairesModel->updateHoraire($id, $jour, $ouverture, $fermeture);
            if ($result) {
                header("Location: /dash");
                exit;
            } else {
                echo "erreur";
            }
        }
        // Récupération de l'horaire pour pré-remplir le formulaire
        $horaire = $this->HorairesModel->getHoraireById($id);
        $title = "Modifier un Horaire";
        $this->render(
            'dash/updatehoraires',
            [
                'horaire' => $horaire,
                'title' => $title
            ]
        );
    }

    public function deleteHoraire($id)
    {
        if (isset($_SESSION['id_User'])) {
            $horairesModel = new HorairesModel();
            $horairesModel->deleteHoraire($id);

            header("Location: /DashHoraires/liste");
            exit;
        } else {
            http_response_code(403);
            echo "Accès refusé";
        }
    }


    public function index()
    {
        $title = "Ajout Horaire";
        if (isset($_SESSION['id_User'])) {
            $this->render("dash/addhoraire", compact('title'));
        } else {
            http_response_code(404);
        }
    }
}
