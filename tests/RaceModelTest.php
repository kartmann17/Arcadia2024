<?php

namespace App\Tests;

use App\Models\RaceModel;
use PHPUnit\Framework\TestCase;

class RaceModelTest extends TestCase
{
    private $raceModel;

    protected function setUp(): void
    {
        // Création d'un mock pour RaceModel avec seulement les méthodes nécessaires
        $this->raceModel = $this->getMockBuilder(RaceModel::class)
                                ->onlyMethods(['req', 'delete'])
                                ->getMock();
    }

    public function testAddRace()
    {
        // Donnée de test
        $raceName = 'Test Race';

        // Configuration method req retourne true
        $this->raceModel->method('req')->willReturn(true);

        // Exécution de la méthode et vérification du résultat
        $result = $this->raceModel->addRace($raceName);
        $this->assertTrue($result);
    }

}