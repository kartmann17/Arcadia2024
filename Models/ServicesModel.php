<?php

namespace App\Models;



class ServicesModel extends Model
{
    protected $id;
    protected $nom;
    protected $description;
    protected $id_user;
    protected $img;

    public function __construct()
    {
        $this->table = 'Service';
    }

    public function createService($nom, $description, $id_user, $img)
    {
        //Préparation de la requete
        return $this->req(
            "INSERT INTO {$this->table} (nom, description, id_user, img) VALUES (:nom, :description, :id_user, :img)",
            [
                'nom' => $nom,
                'description' => $description,
                'id_user' => $id_user,
                'img' => $img
            ]
        );
    }

    public function AllServices()
    {
        return $this->req(
            "SELECT s.*, u.nom as User_nom
            FROM $this->table s
            JOIN User u ON s.id_User = u.id"
        )->fetchAll();
    }

    public function afficheService()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->req($sql)->fetchAll();
        return $result;
    }
    public function selectServiceById($id)
    {
        return $this->req("SELECT * FROM $this->table WHERE id = ?", [$id])->fetch();
    }

    public function getRoles()
    {
        return $this->req('SELECT * FROM Role')->fetchAll();
    }

    // Supprimer un service
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

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

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
}
