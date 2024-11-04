<?php

namespace App\Models;

use App\config\Connexionbdd;

class Model extends Connexionbdd
{
    //Table de la base de données
    protected $table;

    //Instance de DB
    private $db;


    public function findAll()
    {
        $query = $this->req("SELECT * FROM  {$this->table}");
        return $query->fetchAll();
    }



    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        //on boucle pour eclater le tableau
        foreach ($criteres as $champ => $valeur) {
            // SELECT * FROM annonces WHERE id = ? and signale
            //bindValue(1, valeur)
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        // on transforme le tableau champ en une chaine de caractères
        $liste_champs = implode(' AND ', $champs);
        // on exécute la requete
        return $this->req(' SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
    }



    public function find(int $id)
    {
        return $this->req("SELECT * FROM {$this->table} WHERE id = $id ")->fetch();
    }



    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        //on boucle pour eclater le tableau
        foreach ($this as $champ => $valeur) {
            // INSERT INTO annonce (titre, description, prix, ...) VALUES (?, ?, ?)
            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        // on transforme le tableau champ en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        // on exécute la requete
        return $this->req('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES(' . $liste_inter . ')', $valeurs);
    }



    public function update(int $id)
    {
        $champs = [];
        $valeurs = [];

        //on boucle pour eclater le tableau
        foreach ($this as $champ => $valeur) {

            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;


        // on transforme le tableau champ en une chaine de caractères
        $liste_champs = implode(', ', $champs);

        // on exécute la requete
        return $this->req('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }

    public function delete(int $id)
    {
        return $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }


    public function req(string $sql, array $attributs = null)
    {
        $this->db = Connexionbdd::getInstance();

        if ($attributs !== null) {
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // Requête simple
            return $this->db->query($sql);
        }
    }


    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }
}