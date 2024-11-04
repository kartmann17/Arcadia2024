<?php

use App\Autoloader;
use App\config\Main;
use Dotenv\Dotenv;

// Inclure l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Définition d'une constante avec le chemin racine du projet
define('ROOT', dirname(__DIR__));

require_once ROOT . '/Autoloader.php';
Autoloader::register();

$app = new Main();

$app->start();
