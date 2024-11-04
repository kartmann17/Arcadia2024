<?php

namespace App\Models;


class RapportModel extends Model
{
    protected $id;
    protected $nom;
    protected $date;
    protected $status;
    protected $nourriture_reco;
    protected $grammage_reco;
    protected $sante;
    protected $repas_donnees;
    protected $quantite;
    protected $commentaire;
    protected $id_User;
    protected $id_animal;

    public function __construct()
    {
        $this->table = 'Rapport';
    }

    //enregistrement d'un rapport en base
    public function saveRapport($nom, $date, $status, $nourriture_reco, $grammage_reco, $sante, $repas_donnees, $quantite, $commentaire, $id_User, $id_animal)
    {
        return $this->req(
            "INSERT INTO {$this->table} (nom, date, status, nourriture_reco, grammage_reco, sante, repas_donnees, quantite, commentaire, id_User, id_animal)
            VALUES(:nom, :date, :status, :nourriture_reco, :grammage_reco, :sante, :repas_donnees, :quantite, :commentaire, :id_User, :id_animal)",
            attributs: [
                'nom' => $nom,
                'date' => $date,
                'status' => $status,
                'nourriture_reco' => $nourriture_reco,
                'grammage_reco' => $grammage_reco,
                'sante' => $sante,
                'repas_donnees' => $repas_donnees,
                'quantite' => $quantite,
                'commentaire' => $commentaire,
                'id_User' => $id_User,
                'id_animal' => $id_animal
            ]
        );
    }


    public function recherche($id_animal)
    {
        return $this->req(
            "SELECT h.*, a.nom as nom_animal
             FROM Rapport r
             JOIN Animal a On a.id_Animal = r.id_Animal
             WHERE a.id_Animal = :id_animal",
            ['id_animal' => $id_animal]
        )->fetch();
    }

    // Supprimer un rapport
    public function deleteById($id)
    {
        return $this->delete($id);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of nourriture_reco
     */
    public function getNourriture_reco()
    {
        return $this->nourriture_reco;
    }

    /**
     * Set the value of nourriture_reco
     *
     * @return  self
     */
    public function setNourriture_reco($nourriture_reco)
    {
        $this->nourriture_reco = $nourriture_reco;

        return $this;
    }

    /**
     * Get the value of grammage_reco
     */
    public function getGrammage_reco()
    {
        return $this->grammage_reco;
    }

    /**
     * Set the value of grammage_reco
     *
     * @return  self
     */
    public function setGrammage_reco($grammage_reco)
    {
        $this->grammage_reco = $grammage_reco;

        return $this;
    }

    /**
     * Get the value of sante
     */
    public function getSante()
    {
        return $this->sante;
    }

    /**
     * Set the value of sante
     *
     * @return  self
     */
    public function setSante($sante)
    {
        $this->sante = $sante;

        return $this;
    }

    /**
     * Get the value of repas_donnees
     */
    public function getRepas_donnees()
    {
        return $this->repas_donnees;
    }

    /**
     * Set the value of repas_donnees
     *
     * @return  self
     */
    public function setRepas_donnees($repas_donnees)
    {
        $this->repas_donnees = $repas_donnees;

        return $this;
    }

    /**
     * Get the value of quantite
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of id_User
     */
    public function getId_User()
    {
        return $this->id_User;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */
    public function setId_User($id_User)
    {
        $this->id_User = $id_User;

        return $this;
    }

    /**
     * Get the value of id_animal
     */
    public function getId_animal()
    {
        return $this->id_animal;
    }

    /**
     * Set the value of id_animal
     *
     * @return  self
     */
    public function setId_animal($id_animal)
    {
        $this->id_animal = $id_animal;

        return $this;
    }
}
