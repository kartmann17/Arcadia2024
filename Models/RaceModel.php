<?php

namespace App\Models;


class RaceModel extends Model
{
    protected $id;
    protected $race;


    public function __construct()
    {
        $this->table = "Race";
    }

    public function addRace($race)
    {
        return $this->req(
            "INSERT INTO " . $this->table . "(race) VALUES (:race)",
            [
                'race' => $race
            ]
        );
    }


    public function deleteById($id)
    {
        return $this->delete($id);
    }


    public function getId()
    {
        return $this->id;
    }

    public function getRace()
    {
        return $this->race;
    }

    public function setRace($race)
    {
        $this->race = $race;
        return $this;
    }
}
