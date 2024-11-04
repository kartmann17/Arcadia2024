<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;
use App\Models\RaceModel;
class AnimauxController extends Controller
{
    public function index()
    {
        $title = "Nos Animaux";
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();
        $this->render("animaux/index", [
            'animaux' => $animaux,
            'univers' => $univers,
            'races' => $races,
            'title' => $title
        ]);
    }

    // compteur de visite
    public function incrementVisits()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['id'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'ID manquant']);
            return;
        }

        $AnimauxModel = new AnimauxModel();
        $success = $AnimauxModel->incrementVisits(intval($data['id']));

        $response = $success
            ? ['success' => true]
            : ['success' => false, 'message' => 'Erreur lors de la mise à jour'];

        echo json_encode($response);
    }

}
