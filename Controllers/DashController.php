<?php

namespace App\Controllers;

class DashController extends Controller
{
    //affichage du dashboard des employés
    public function index()
    {
        $title = "Dashboard";
        if (isset($_SESSION['id_User'])) {
            $this->render('dash/index', compact('title'));
        } else {
            http_response_code(404);
            echo "la page recherchée n'existe pas";
        }
    }
}
