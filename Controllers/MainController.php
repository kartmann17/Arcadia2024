<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\HorairesModel;

class MainController extends Controller
{
    public function index()
    {
        $title = "Zoo Arcadia";
        $AvisModel = new AvisModel();
        $Avis = $AvisModel->findAll();

        $HorairesModel = new HorairesModel();
        $horaires = $HorairesModel->getAllHoraires();
        $this->render("acceuil/index", compact("Avis", "horaires", "title"));  //Affichage des avis validé depuis le dashboard sur la page d'accueil
    }

}
