<?php

namespace App\Controllers;

use App\Models\UniversModel;

class DashUniversController extends DashController
{
    //Ajout d'un habitat (univer)
    public function ajoutUnivers()
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? '';
            $img = $_POST['img'] ?? '';
            $description = $_POST['description'] ?? '';



            //Verification de tous les champ sont remplis
            if (!empty($nom) && !empty($img) && !empty($description)) {

                // Appel du modèle pour l'insertion en base
                $UniversModel = new UniversModel();
                $result = $UniversModel->addUnivers($nom, $img, $description);


                if ($result) {
                    $_SESSION["success_message"] = "Habitat ajouté avec succès.";
                } else {
                    $_SESSION["error_message"] = "Erreur lors de l'ajout de l'habitat.";
                }

                // Redirection après traitement
                header("Location: /dash");
                exit();
            } else {
                echo "Tous les champs sont requis.";
            }
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $this->render('dash/index', [
                'section' => 'addunivers'
            ]);
        } else {
            http_response_code(404);
        }
    }


    //mise à jour des habitat (univer)
    public function updateUnivers($id)
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Vérification que tous les champs sont remplis
            $UniversModel->hydrate($_POST);

            // Appel du modèle pour l'insertion en base
            if ($UniversModel->update($id)) {


                $_SESSION["success_message"] = "Univer modifié avec succès.";
            } else {
                $_SESSION["error_message"] = "Erreur lors de la modification.";
            }

            // Redirection après traitement
            header("Location: /dash");
            exit;
        }

        $this->render('dash/updateunivers', [
            'univers' => $univers
        ]);
    }

    // Suppression des habitats (univer)
    public function deleteUniver()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $UniversModel = new UniversModel();

                $result = $UniversModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'habitat a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'habitat.";
                }
            } else {
                $_SESSION['error_message'] = "ID d'habitat invalide.";
            }

            // Redirection vers le dashboard
            header("Location: /dash");
            exit();
        }
    }

    // Liste des habitats (univer)
    public function liste()
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->findAll();

        if (isset($_SESSION['id_User'])) {
            $this->render('dash/listeunivers', [
                'univers' => $univers
            ]);
        } else {
            http_response_code(404);
        }
    }
    public function index()
    {
        if (isset($_SESSION['id_User'])) {
            // Affichage de la vue d'ajout des animaux
            $this->render("dash/addunivers");
        } else {
            http_response_code(404);
        }
    }
}
