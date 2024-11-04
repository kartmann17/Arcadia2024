<?php

namespace App\Models;

class AnimauxModel extends Model
{
    protected $id;
    protected $nom;
    protected $age;
    protected $img;
    protected $visite;
    protected $id_race;
    protected $id_habitat;
    protected $description;


    public function __construct()
    {
        $this->table = "Animal";
    }

    //Ajout d'animaux en base
    public function addAnimaux($nom, $age, $img, $id_race, $id_habitat, $description)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (nom, age, img, id_race, id_habitat, description)
             VALUES (:nom, :age, :img, :id_race, :id_habitat, :description)",
            [
                'nom' => $nom,
                'age' => $age,
                'img' => $img,
                'id_race' => $id_race,
                'id_habitat' => $id_habitat,
                'description' => $description,
            ]
        );
    }

    public function getAnimauxById($id)
    {
        $sql = "
        SELECT
            a.*,
            r.race AS race_nom,
            h.nom AS habitat_nom
        FROM
            {$this->table} a
        JOIN
            Race r ON a.id_race = r.id
        JOIN
            Habitat h ON a.id_habitat = h.id
        WHERE
            a.id = ?";
        return $this->req($sql, [$id])->fetch();
    }

    //obtentention animaux par id
    public function getAnimauxByUnivers($id_habitat)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_habitat = ?";
        return $this->req($sql, [$id_habitat])->fetchAll();
    }

    // compteur de visite par animaux
    public function incrementVisits(int $id)
    {
        $sql = 'UPDATE ' . $this->table . ' SET visite = visite + 1 WHERE id = ?';
        return $this->req($sql, [$id]);
    }



    //supression des animaux
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
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of visite
     */
    public function getVisite()
    {
        return $this->visite;
    }
    /**
     * Set the value of visite
     *
     * @return  self
     */
    public function setVisite($visite)
    {
        $this->visite = $visite;

        return $this;
    }

    /**
     * Get the value of id_race
     */
    public function getId_race()
    {
        return $this->id_race;
    }

    /**
     * Set the value of id_race
     *
     * @return  self
     */
    public function setId_race($id_race)
    {
        $this->id_race = $id_race;

        return $this;
    }

    /**
     * Get the value of id_habitat
     */
    public function getId_habitat()
    {
        return $this->id_habitat;
    }

    /**
     * Set the value of id_habitat
     *
     * @return  self
     */
    public function setId_habitat($id_habitat)
    {
        $this->id_habitat = $id_habitat;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

}
