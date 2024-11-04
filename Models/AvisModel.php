<?php

namespace App\Models;

use App\Config\Connexionbdd;
use PDO;

class AvisModel extends Model
{
    protected $id;
    protected $etoiles;
    protected $nom;
    protected $commentaire;
    protected $date;
    protected $valide;


    public function __construct()
    {
        $this->table = 'addavis';
    }

    public function afficheAvis()
    {
        // Requête SQL pour récupérer tous les avis
        $sql = "SELECT * FROM  {$this->table}";
        $result = $this->req($sql)->fetchAll();
        return $result;
    }

    // Enregistrer un avis
    public function saveAvis($etoiles, $nom, $commentaire, $date)
    {
        // Préparation et exécution de la requête
        return $this->req(
            "INSERT INTO {$this->table} (etoiles, nom, commentaire, date) VALUES (:etoiles, :nom, :commentaire, :date)",
            attributs: [
                'etoiles' => $etoiles,
                'nom' => $nom,
                'commentaire' => $commentaire,
                'date' => $date
            ]
        );
    }

//validation des avis dans le dashboard
    public function DashValiderAvis($id)
    {
        return $this->req("UPDATE {$this->table} SET valide = 1 WHERE id = ?", [$id]);
    }

    // Récupérer tous les avis non validés
    public function findNonValides()
    {
        $sql = "SELECT * FROM {$this->table} WHERE valide = 0";
        return $this->req($sql);
    }

    public function valideAvis($valide)
    {
        $sql = "SELECT * FROM {$this->table} WHERE valide = ?"; //permet d'afficher les avis sur la page d'accueil
        return $this->req($sql, [$valide])->fetchAll();
    }

    // Supprimer un avis
    public function deleteById($id)
    {
        return $this->delete($id);
    }

    /**
     * Get the value of valide
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set the value of valide
     *
     * @return  self
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }
}
