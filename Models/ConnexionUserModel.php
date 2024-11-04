<?php

namespace App\Models;

class ConnexionUserModel extends Model
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $pass;
    protected $id_role;
    
    public function __construct()
    {
        $this->table = "User";
    }
    public function recherche($email)
    {
        return $this->req(
            "SELECT u.id, u.nom, u.prenom, u.email, u.pass, r.role
            FROM User u
            JOIN Role r ON u.id_role = r.id
            WHERE u.email = :email",
            ['email' => $email]
        )->fetch();
    }

    /**
     * Get the value of id_role
     */
    public function getId_role()
    {
        return $this->id_role;
    }

    /**
     * Set the value of id_role
     *
     * @return  self
     */
    public function setId_role($id_role)
    {
        $this->id_role = $id_role;

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
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
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
}
