<?php

require '../../config.php';

class patientC
{
    public function listPatient()
    {
        $sql = "SELECT * FROM `patient`";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletePatient($id)
    {
        $sql = "DELETE FROM `patient` WHERE id_patient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addPatient(Patient $patient)
    {
        $sql = "INSERT INTO `patient`  
        VALUES (
            NULL, 
            :nom,
            :prenom,
            :telephone,
            :email,
            :genre,
            :heure_rdv
        )";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            
            $query->execute([
                'nom' => $patient->getNom(),
                'prenom' => $patient->getPrenom(),
                'telephone' => $patient->getTelephone(),
                'email' => $patient->getEmail(),
                'genre' => $patient->getgenre(),
                'heure_rdv' => $patient->getHeure_rdv(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showPatient($id)
    {
        $sql = "SELECT * FROM `patient` WHERE id_patient = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $patient = $query->fetch();
            return $patient;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatePatient($patient, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `patient` SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    telephone = :telephone, 
                    email = :email, 
                    genre = :genre, 
                    heure_rdv = :heure_rdv
                WHERE id_patient = :id_patient'
            );

            $query->execute([
                'id_patient' => $id,
                'nom' => $patient->getNom(),
                'prenom' => $patient->getPrenom(),
                'telephone' => $patient->getTelephone(),
                'email' => $patient->getemail(),
                'genre' => $patient->getgenre(),
                'heure_rdv' => $patient->getHeure_rdv(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>