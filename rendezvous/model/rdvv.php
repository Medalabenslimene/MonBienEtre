<?php
class RDV
{
    private ?int $idRdv = null;
    private ?string $specialite = null;
    private ?string $date = null;
    private ?string $heure = null;
    private ?string $description = null;
    private ?int $idUser = null;

    public function __construct($idRdv = null, $specialite, $date, $heure, $description, $idUser)
    {
        $this->idRdv = $idRdv;
        $this->specialite = $specialite;
        $this->date = $date;
        $this->heure = $heure;
        $this->description = $description;
        $this->idUser = $idUser;
    }

    public function getIdRdv()
    {
        return $this->idRdv;
    }

    public function getSpecialite()
    {
        return $this->specialite;
    }

    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function setHeure($heure)
    {
        $this->heure = $heure;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
}

