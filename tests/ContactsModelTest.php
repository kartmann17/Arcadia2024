<?php

namespace App\tests;

use App\Models\ContactsModel;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;


class ContactsModelTest extends TestCase
{
    private $contactsModel;

    protected function setUp(): void
    {
        // Charger les variables d'environnement pour configurer la connexion, si nécessaire
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        // Instanciation du modèle ContactsModel
        $this->contactsModel = new ContactsModel();
    }


    public function testDeleteById()
    {
        // ID pour la suppression
        $id = 1;

        // Simulation de la méthode delete pour retourner un succès
        $this->contactsModel = $this->getMockBuilder(ContactsModel::class)
                                    ->onlyMethods(['delete'])
                                    ->getMock();
        $this->contactsModel->method('delete')->willReturn(true);

        // Appel de la méthode deleteById
        $result = $this->contactsModel->deleteById($id);

        // Vérification que la suppression est réussie
        $this->assertTrue($result);
    }
}