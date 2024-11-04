<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;
use App\Models\RaceModel;

class DashAnimauxController extends DashController
{
    public function ajoutAnimaux()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? '';
            $age = $_POST['age'] ?? '';
            $img = $_POST['img'] ?? '';
            $id_race = $_POST['id_race'] ?? '';
            $id_habitat = $_POST['id_habitat'] ?? '';
            $description = $_POST['description']?? '';

            // Vérification que tous les champs sont remplis
            if (!empty($nom) && !empty($age) && !empty($img) && !empty($id_race) && !empty($id_habitat) && !empty($description)) {

                if (strlen($nom) < 2) {
                    $_SESSION['error_message'] = "Le nom doit comporter au moins 2 caractères.";
                    header("Location: /addanimaux");
                    exit;
                }

                // Appel du modèle pour l'insertion en base
                $AnimauxModel = new AnimauxModel();
                $result = $AnimauxModel->addAnimaux($nom, $age, $img, $id_race, $id_habitat, $description);

                if ($result) {
                    $_SESSION["success_message"] = "Animal ajouté avec succès.";
                } else {
                    $_SESSION["error_message"] = "Erreur lors de l'ajout de l'animal.";
                }
            } else {
                $_SESSION["error_message"] = "Tous les champs sont requis.";
            }

            // Redirection après traitement
            header("Location: /dash");
            exit;
        }
    }

    public function deleteAnimal()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $AnimauxModel = new AnimauxModel();

                $result = $AnimauxModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'animal a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'animal.";
                }
            } else {
                $_SESSION['error_message'] = "ID d'animal invalide.";
            }

            // Redirection vers la dashboard
            header("Location: /dash");
            exit();
        }
    }

    // affichage de la liste des animaux dans l'onglet liste
    public function liste()
    {
        $title = "Liste Animaux";
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        if (isset($_SESSION['id_User'])) {
            $this->render('dash/listeanimaux',
            [
                'animaux' => $animaux,
                'title' => $title
            ]);
        } else {
            http_response_code(404);
        }
    }

    //mise a jour des animaux
    public function updateAnimal($id)
{
    $animauxModel = new AnimauxModel();
    $animaux = $animauxModel->find($id); // Récupération de l'animal existant
    $universModel = new UniversModel();
    $univers = $universModel->findAll();
    $raceModel = new RaceModel();
    $races = $raceModel->findAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Hydrater le modèle avec les données POST
        $animauxModel->hydrate($_POST);

        // Vérification et traitement du fichier image
        if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['img']; // Utiliser le bon nom pour le champ d'upload

            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            if (in_array($image['type'], $allowedTypes)) {

                $uploadDir = '/Asset/uploadImg/'; // Chemin vers le répertoire d'upload
                $fileName = uniqid() . '-' . basename($image['name']); // Génération d'un nom de fichier unique
                $filePath = $uploadDir . $fileName;
                // Déplacement du fichier dans le répertoire d'upload
                if (move_uploaded_file($image['tmp_name'], $filePath)) {
                    // Suppression de l'ancienne image si elle existe
                    if ($animaux->getImg()) {
                        $oldImagePath = '/Asset/uploadImg/' . $animaux->getImg();
                        var_dump($oldImagePath);
                        die();
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath); // Suppression de l'ancienne image
                        }
                    }

                    // Mise à jour du chemin de l'image dans le modèle
                    $animauxModel->setImg('/Asset/uploadImg/' . $fileName); // Stocke le chemin relatif
                } else {
                    $error = "Erreur lors du téléchargement de l'image.";
                }
            } else {
                $error = "Type de fichier non supporté.";
            }
        }

        // Mise à jour en base de données
        if ($animauxModel->update($id)) {
            $_SESSION["success_message"] = "Animal modifié avec succès.";
        } else {
            $_SESSION["error_message"] = "Erreur lors de la modification.";
        }

        // Redirection après traitement
        header("Location: /DashAnimaux/liste");
        exit;
    }

    // Affichage de la vue pour la mise à jour
    $title = "Mise à jour animaux";
    $this->render('dash/updateanimaux', [
        'animaux' => $animaux,
        'univers' => $univers,
        'races' => $races,
        'title' => $title
    ]);
}

    // affichage de la page des animaux dans le dashboard
    public function index()
    {

        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();
        if (isset($_SESSION['id_User'])) {
            // Affichage de la vue d'ajout des animaux
            $this->render("dash/addanimaux", compact('animaux', 'univers', 'races'));
        } else {
            http_response_code(404);
        }
    }
}
