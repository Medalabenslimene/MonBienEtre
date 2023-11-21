<?php

require '../../config.php';

class PatientC
{
    public function listPatients()
    {
        $sql = "SELECT * FROM patient";
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
        $sql = "DELETE FROM patient WHERE id_patient = :id";
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
        $sql = "INSERT INTO patient  
        VALUES (
            NULL, 
            :nom,
            :prenom,
            :age,
            :email,
            :password,
            :telephone,
            :genre
        )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $patient->getNom(),
                'prenom' => $patient->getPrenom(),
                'age' => $patient->getAge(),
                'email' => $patient->getEmail(),
                'password' => $patient->getPassword(),
                'telephone' => $patient->getTelephone(),
                'genre' => $patient->getGenre(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showPatient($id)
    {
        $sql = "SELECT * FROM patient WHERE id_patient = $id";
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
                'UPDATE patient SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    age = :age,
                    email = :email,
                    password = :password,
                    telephone = :telephone,
                    genre = :genre
                WHERE id_patient = :id_patient'
            );

            $query->execute([
                'id_patient' => $id,
                'nom' => $patient->getNom(),
                'prenom' => $patient->getPrenom(),
                'age' => $patient->getAge(),
                'email' => $patient->getEmail(),
                'password' => $patient->getPassword(),
                'telephone' => $patient->getTelephone(),
                'genre' => $patient->getGenre(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>
