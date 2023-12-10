<?php

class Reponse
{
    public ?int $idReponse = null;
    public ?int $idReclamation = null; // Foreign key to link with the reclamation table
    public ?string $reponse;
    public ?string $dateReponse;

    public function __construct($idReponse, $idReclamation, $reponse, $dateReponse)
    {
        $this->idReponse = $idReponse;
        $this->idReclamation = $idReclamation;
        $this->reponse = $reponse;
        $this->dateReponse = $dateReponse;
    }

    // Add getters and setters as needed

    public function getIdReponse()
    {
        return $this->idReponse;
    }

    public function setIdReponse($idReponse)
    {
        $this->idReponse = $idReponse;

        return $this;
    }

    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    public function setIdReclamation($idReclamation)
    {
        $this->idReclamation = $idReclamation;

        return $this;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getDateReponse()
    {
        return $this->dateReponse;
    }

    public function setDateReponse($dateReponse)
    {
        $this->dateReponse = $dateReponse;

        return $this;
    }
}

?>
