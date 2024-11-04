<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\ContactsModel;

class ContactsController extends Controller
{
    // affichege de la page contacts
    public function index()
    {
        $title = "Contacts";
        $this->render('contacts/index', compact('title'));
    }

    //affichage des contacts dans le dashboard
    public function afficheMessage()
    {

        $ContactsModel = new ContactsModel();
        $contacts = $ContactsModel->findAll();
        $this->render("dash/listecontact", ['contacts' => $contacts]);
    }


    // Soumission du message
    public function ajoutMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            if (!empty($nom) && !empty($email) && !empty($message)) {
                // Adresse email de l'admin
                $adminEmail = $_ENV['SMTP_USER'];
                $adminSubject = "Nouveau message de contact";
                $adminMessage = "Vous avez reçu un nouveau message de :\n\n";
                $adminMessage .= "Nom : $nom\n";
                $adminMessage .= "Email : $email\n";
                $adminMessage .= "Message : $message\n";

                // Enregistrement du message dans la base de données
                $ContactsModel = new ContactsModel();
                $result = $ContactsModel->saveMessage($nom, $email, $message);

                // Envoi de l'email à l'admin
                if ($this->sendEmail($adminEmail, $adminSubject, $adminMessage)) {
                    // Envoi d'une confirmation au client
                    $clientSubject = "Confirmation de réception de votre message";
                    $clientMessage = "Bonjour $nom,\n\nMerci de nous avoir contactés. Voici une copie de votre message :\n\n";
                    $clientMessage .= "Nom : $nom\n";
                    $clientMessage .= "Email : $email\n";
                    $clientMessage .= "Message : $message\n\n";
                    $clientMessage .= "Nous vous répondrons dès que possible.";

                    // Envoi de l'email au client
                    if ($this->sendEmail($email, $clientSubject, $clientMessage)) {
                        $_SESSION['success_message'] = "Votre message a été envoyé avec succès.";
                    } else {
                        $_SESSION['error_message'] = "Votre message a été envoyé, mais la confirmation par email n'a pas pu être envoyée.";
                    }
                } else {
                    $_SESSION['error_message'] = "Erreur lors de l'envoi du message. Veuillez réessayer.";
                }

                // Redirection après traitement sur la page contact
                header("Location: /contacts");
                exit();
            } else {
                $_SESSION['error_message'] = "Veuillez remplir correctement tous les champs.";
                header("Location: /contacts");
                exit();
            }
        }
    }

    //suppression des contacts dans le Dashboard
    public function deleteContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $ContactsModel = new ContactsModel();

                $result =  $ContactsModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "Le contact a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression du contact.";
                }
            }
            // Redirection vers la dashboard
            header("Location: /Contacts/afficheMessage");
            exit();
        }
    }

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

            // Utiliser une adresse email valide
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
}
