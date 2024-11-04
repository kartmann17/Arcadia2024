<?php

namespace App;

class Autoloader
{
    public static function register()
    {
        require __DIR__ . '/vendor/autoload.php';
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__) === 0) {

            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            // On convertit les namespaces en chemins de dossiers en utilisant des '/'
            $class = str_replace('\\', '/', $class);
            // On ajoute '.php' à la fin du nom de la classe pour construire le chemin du fichier
            $file = __DIR__ . '/' . $class . '.php';
            // Si le fichier existe, on le charge
            if (file_exists($file)) {
                require_once $file;
            }else{
                error_log("autoloader error $file");
            }
        }
    }
}