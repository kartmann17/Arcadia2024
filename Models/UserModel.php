<?php

namespace App\Models;

class UserModel extends Model
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

    public function selectionRole($role)
    {
        return $this->req("SELECT id FROM Role WHERE role = :role", ['role' => $role])->fetch();
    }

    public function getRoles()
    {
        return $this->req('SELECT * FROM Role')->fetchAll();
    }

    public function selectAllRole()
    {
        $sql = "
        SELECT
            u.id,
            u.nom,
            u.prenom,
            u.email,
            u.pass,
            r.role AS role
        FROM
            {$this->table} u
         JOIN
            Role r ON u.id_role = r.id";
        return $this->req($sql)->fetchAll();
    }

    public function createUser($nom, $prenom, $email, $pass, $id_role)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (nom, prenom, email, pass, id_role)
            VALUES (:nom, :prenom, :email, :pass, :id_role)",
            [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'pass' => $pass,
                'id_role' => $id_role
            ]
        );
    }

    public function listeUser()
    {
        // Requête SQL pour récupérer tous les user
        $sql = "SELECT * FROM  {$this->table}";
        $result = $this->req($sql)->fetchAll();
        return $result;
    }

    //supression des utilisateurs
    public function deleteById($id)
    {
        return $this->delete($id);
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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }



    /**
     * Get the value of id_role
     */
    public function getId_role(): array
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
}
