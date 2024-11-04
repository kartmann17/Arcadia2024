<?php

namespace App\Controllers;

abstract class Controller
{
    public function render(string $file, array $donnees = [])
    {

        // on extrait le contenu de $donnees
        extract($donnees); //methodes extract qui permet d'extraire les données
        ob_start();
        require_once ROOT . "/Views/" . $file . ".php";
        $contenu = ob_get_clean(); //prend la donnée et la garde en mémoire
        require_once ROOT . "/Views/default.php";
    }
}
