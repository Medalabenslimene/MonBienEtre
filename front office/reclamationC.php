<?php

require '../../config.php';

class ReclamationC
{

    public function listReclamations($search = null)
{
    $sql = "SELECT * FROM reclamation";
    if ($search) {
        $sql .= " WHERE pseudo LIKE :search OR CIN LIKE :search OR type LIKE :search OR commentaire LIKE :search";
    }
    

    $db = config::getConnexion();
    try {
        if ($search) {
            $query = $db->prepare($sql);
            $query->bindValue(':search', '%' . $search . '%');
            $query->execute();
        } else {
            $query = $db->query($sql);
        }
        $liste = $query->fetchAll();
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    function deleteReclamation($idReclamation)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idReclamation);

        try {
            $req->execute();
            echo "Reclamation deleted successfully!";
        } catch (Exception $e) {
            echo 'Error deleting reclamation: ' . $e->getMessage();
        }
    }

    function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :pseudo, :CIN, :type, :commentaire)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'pseudo' => $reclamation->getPseudo(),
                'CIN' => $reclamation->getCIN(),
                'type' => $reclamation->getType(),
                'commentaire' => $reclamation->getCommentaire(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showReclamation($id)
    {
        $sql = "SELECT * from reclamation where id_reclamation = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    pseudo = :pseudo, 
                    CIN = :CIN, 
                    type = :type, 
                    commentaire = :commentaire
                WHERE id_reclamation = :id'
            );

            $query->execute([
                'id' => $id,
                'pseudo' => $reclamation->getPseudo(),
                'CIN' => $reclamation->getCIN(),
                'type' => $reclamation->getType(),
                'commentaire' => $reclamation->getCommentaire(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error updating reclamation: ' . $e->getMessage();
        }
    }

    function supprimerReclamation($idReclamation)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idReclamation);

        try {
            $req->execute();
            echo "Reclamation deleted successfully!";
        } catch (Exception $e) {
            echo 'Error deleting reclamation: ' . $e->getMessage();
        }
    }
    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponses (id_reclamation, reponse, date_reponse)  
        VALUES (:id_reclamation, :reponse, :date_reponse)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_reclamation' => $reponse->getIdReclamation(),
                'reponse' => $reponse->getReponse(),
                'date_reponse' => $reponse->getDateReponse(),
            ]);
        } catch (Exception $e) {
            echo 'Error adding reponse: ' . $e->getMessage();
        }
    }
    public function ajouterReponse($idReclamation, $reponse) {
        // Perform the logic to add the response to the reclamation
        // For example, you might use a database query to update the reclamation record
        // with the provided response.

        // For demonstration purposes, let's assume there is a method in your model
        // (Reclamation class) to handle the database update.
        $reclamationModel = new Reclamation(); // Assuming you have a Reclamation model
        $reclamationModel->addReponseToReclamation($idReclamation, $reponse);
    }
    function getReponses($idReclamation)
    {
        $sql = "SELECT * FROM reponses WHERE id_reclamation = :idReclamation";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':idReclamation', $idReclamation);
        $query->execute();

        $reponses = $query->fetchAll();
        return $reponses;
    }
    function getReponsesByReclamationId($idReclamation)
    {
        $sql = "SELECT * FROM reponses WHERE id_reclamation = :id_reclamation";
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_reclamation', $idReclamation);
        $stmt->execute();

        $reponses = $stmt->fetchAll();
        return $reponses;
    }
}
