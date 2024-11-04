<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class DashUserController extends DashController
{
    //Ajout des users
    public function ajoutUser()
    {
        $userModel = new UserModel();
        $roleModel = new RoleModel();
        $users = $userModel->findAll();
        $roles = $roleModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $email = $_POST['email'] ?? '';
            $pass = $_POST['pass'] ?? '';
            $role = $_POST['role'] ?? '';

            if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($pass) && !empty($role)) {

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error_message'] = "L'email est invalide";
                    header("Location: /adduser");
                    exit;
                }

                // Hashage du mot de passe
                $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

                // Appel du modèle pour l'insertion
                $result = $userModel->createUser($nom, $prenom, $email, $hashedPass, $role);

                if ($result) {
                    // Envoi de l'email à l'utilisateur (sans le mot de passe)
                    $clientSubject = "Votre compte a été créé";
                    $clientMessage = "Bonjour $nom $prenom,\n\n";
                    $clientMessage .= "Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter avec votre email : $email.\n";
                    $clientMessage .= "Veuillez vous rapprocher de nous pour connaître votre mot de passe .";

                    // Envoi de l'email
                    if ($this->sendEmail($email, $clientSubject, $clientMessage)) {
                        $_SESSION['success_message'] = "Utilisateur ajouté et email envoyé avec succès.";
                    } else {
                        $_SESSION['error_message'] = "Utilisateur ajouté, mais l'email n'a pas pu être envoyé.";
                    }
                } else {
                    $_SESSION['error_message'] = "Erreur lors de l'ajout de l'utilisateur.";
                }
            } else {
                $_SESSION['error_message'] = "Tous les champs sont requis.";
            }
            header("Location: /dash");
            exit;
        }
    }

    //envoi de mail au nouveaux utilisateurs
    private function sendEmail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);
        try {

            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['SMTP_PORT'];
            $mail->CharSet = 'UTF-8';


            $mail->setFrom($_ENV['SMTP_FROM'], $_ENV['SMTP_FROM_NAME']);
            $mail->addAddress($to);

            // Contenu de l'email
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Envoyer l'email
            return $mail->send();
        } catch (Exception $e) {
            error_log("Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo);
            return false;
        }
    }


    //supression des utilisateurs
    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $userModel = new UserModel();

                $result = $userModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'utilisateur a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'utilisateur.";
                }
            } else {
                $_SESSION['error_message'] = "ID utilisateur invalide.";
            }

            // Redirection vers le dashboard
            header("Location: /dash");
            exit();
        }
    }

    //Liste des utilisateurs
    public function liste()
    {
        $userModel = new UserModel();
        $user = $userModel->selectAllRole();
        if (isset($_SESSION['id_User'])) {
            $this->render(
                'dash/listeuser',
                [
                    'user' => $user
                ]
            );
        } else {
            http_response_code(404);
        }
    }

    //affichage de la page adduser
    public function index()
    {
        if (isset($_SESSION['id_User'])) {
            $this->render("dash/adduser");
        } else {
            http_response_code(404);
        }
    }
}
