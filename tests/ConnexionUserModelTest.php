<?php

namespace App\tests;

use App\Models\ConnexionUserModel;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class ConnexionUserModelTest extends TestCase
{
    public function testRecherche()
    {// Chargement variables d'environnement
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $email = 'jose@gmail.com';

        // Instancier le modèle ConnexionUserModel
        $connexionUserModel = new ConnexionUserModel();

        // Appele de la méthode recherche et capturer le résultat
        $result = $connexionUserModel->recherche($email);

        // Vérification de l'email
        $this->assertSame($email, $result->email);

        // Vérifiecation des autres champs pour valider les informations de l'utilisateur
        $this->assertNotNull($result->id);
        $this->assertNotNull($result->nom);
        $this->assertNotNull($result->prenom);
        $this->assertNotNull($result->role);
    }
}