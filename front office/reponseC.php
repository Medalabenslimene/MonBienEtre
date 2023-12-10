<?php

require '../../config.php';

class ReponseC
{
    // ... (other existing methods)

    function listReponses()
    {
        $sql = "SELECT * FROM reponses";
        $db = config::getConnexion();
        $query = $db->query($sql);

        $reponses = $query->fetchAll();
        return $reponses;
    }
    function obtenirReponseParIdReclamation($id_reclamation) {
        $reponseC = new ReponseC();
        $reponses = $reponseC->getReponsesByReclamation($id_reclamation);
    
        // If there are responses, return the first one
        if (!empty($reponses)) {
            return $reponses[0]['reponse'];
        }
    
        // If no responses, return an empty string or handle it accordingly
        return "";
    }
    
    public function ajouterReponse($idReclamation, $reponse) {
        // Instantiate the Reclamation model with the necessary arguments
        $reclamationModel = new Reclamation(/* pass the required arguments here */);

        // Assuming you have a method in your Reclamation model to handle the database update
        $reclamationModel->addReponseToReclamation($idReclamation, $reponse);
    }


    function getReponsesByReclamation($idReclamation)
    {
        $sql = "SELECT * FROM reponses WHERE id_reclamation = :id_reclamation";
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_reclamation', $idReclamation);
        $stmt->execute();

        $reponses = $stmt->fetchAll();
        return $reponses;
    }
    // ... (other existing methods)
}


?>
