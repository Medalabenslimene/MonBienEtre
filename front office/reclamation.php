<?php
class Reclamation
{
    public ?int $idReclamation = null;
    public ?string $pseudo;
    public ?string $cin;
    public ?string $type;
    public ?string $commentaire;
    private $reponse;

    public function __construct($id, $pseudo, $cin, $type, $commentaire)
    {
        $this->idReclamation = $id;
        $this->pseudo = $pseudo;
        $this->cin = $cin;
        $this->type = $type;
        $this->commentaire = $commentaire;
    }

    public function getIdReclamation()
    {
        return $this->idReclamation;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getCIN()
    {
        return $this->cin;
    }

    public function setCIN($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }
    public function ajouterReponse($idReclamation, $reponse) {
        // Use your database connection and query to insert the response
        // Replace this with your actual database operations
        $query = "UPDATE reclamations SET reponse = :reponse WHERE id_reclamation = :id_reclamation";
        $params = array(':reponse' => $reponse, ':id_reclamation' => $idReclamation);
    
        // Execute your query using your preferred database connection library
        $this->db->execute($query, $params);
    }
    // Correction de l'erreur ici
    
}
?>
