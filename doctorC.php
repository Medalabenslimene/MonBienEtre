<?php

require '../../config.php';

class DoctorC
{
    public function listDoctors()
    {
        $sql = "SELECT * FROM doctors";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteDoctor($id)
    {
        $sql = "DELETE FROM doctors WHERE id_docteur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addDoctor(Doctor $doctor)
    {
        $sql = "INSERT INTO doctors  
        VALUES (
            NULL, 
            :nom,
            :prenom,
            :telephone,
            :adresse,
            :email,
            :password,
            :specialite
        )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $doctor->getNom(),
                'prenom' => $doctor->getPrenom(),
                'telephone' => $doctor->getTelephone(),
                'adresse' => $doctor->getAdresse(),
                'email' => $doctor->getEmail(),
                'password' => $doctor->getPassword(),
                'specialite' => $doctor->getSpecialite(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showDoctor($id)
    {
        $sql = "SELECT * FROM doctors WHERE id_docteur = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $doctor = $query->fetch();
            return $doctor;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateDoctor($doctor, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE doctors SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    telephone = :telephone,
                    adresse = :adresse,
                    email = :email,
                    password = :password,
                    specialite = :specialite
                WHERE id_docteur = :id_docteur'
            );

            $query->execute([
                'id_docteur' => $id,
                'nom' => $doctor->getNom(),
                'prenom' => $doctor->getPrenom(),
                'telephone' => $doctor->getTelephone(),
                'adresse' => $doctor->getAdresse(),
                'email' => $doctor->getEmail(),
                'password' => $doctor->getPassword(),
                'specialite' => $doctor->getSpecialite(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>
