<?php

namespace App\Models;


class ContactsModel extends Model
{
    protected $id;
    protected $nom;
    protected $email;
    protected $message;

    public function __construct()
    {
        $this->table = 'contacts';
    }
    public function afficheMessage()
    {
        // Requête SQL pour récupérer tous les messages
        $sql = "SELECT * FROM  {$this->table}";
        return $this->req($sql)->fetchAll();

    }

    // Enregistrer un message
    public function saveMessage($nom, $email, $message)
    {

        // Préparation et exécution de la requête
        return $this->req(
            "INSERT INTO {$this->table} (nom, email, message) VALUES (:nom, :email, :message)",
            attributs: [
                'nom' => $nom,
                'email' => $email,
                'message' => $message
            ]
        );
    }

    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
