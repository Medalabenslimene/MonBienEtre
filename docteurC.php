<?php

require '../../config.php';

class docteurC
{
    public function listDocteur()
    {
        $sql = "SELECT * FROM `docteur`";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteDocteur($id)
    {
        $sql = "DELETE FROM `docteur` WHERE id_docteur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addDocteur(Docteur $docteur)
    {
        $sql = "INSERT INTO `docteur`  
        VALUES (
            NULL, 
            :nom,
            :prenom,
            :telephone,
            :email,
            :specialite,
            :heure_depart
        )";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            
            $query->execute([
                'nom' => $docteur->getNom(),
                'prenom' => $docteur->getPrenom(),
                'telephone' => $docteur->getTelephone(),
                'email' => $docteur->getEmail(),
                'specialite' => $docteur->getspecialite(),
                'heure_depart' => $docteur->getHeure_depart(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showDocteur($id)
    {
        $sql = "SELECT * FROM `docteur` WHERE id_docteur = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $docteur = $query->fetch();
            return $docteur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateDocteur($docteur, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `docteur` SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    telephone = :telephone, 
                    email = :email, 
                    specialite = :specialite, 
                    heure_depart = :heure_depart
                WHERE id_docteur = :id_docteur'
            );

            $query->execute([
                'id_docteur' => $id,
                'nom' => $docteur->getNom(),
                'prenom' => $docteur->getPrenom(),
                'telephone' => $docteur->getTelephone(),
                'email' => $docteur->getemail(),
                'specialite' => $docteur->getspecialite(),
                'heure_depart' => $docteur->getHeure_depart(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
/*public function listDoctorsLastNameZA()
{
$sal = "SELECT * FROM docteur ORDER BY nom DESC";
$db = config: : getConnexion () ;
try {
$list = $db-›query ($sq1);
return $list;
} catch (Exception $e) {
die('Error:' $e-›getMessage());
}
}
function search ($recherche){
    $sql = "SELECT * FROM docteur
    WHERE nom LIKE :recherche
    OR telephone telephone LIKE :recherchee
    OR specialite LIKE :rechercheee"
    $db = config: : getConnexion () ;
    try {
    $query = $db-›prepare($sql); $query-›bindValue(":recherche'
    3
    "%' " $recherche '%');
    $query-›bindValue(': recherchee'. *%'
    •$recherche
    *%');
    $query-›bindValue(":rechercheee'
    '%' . $recherche
    '%');
    Squery-›execute() ;
    $events = $query-›fetchAl1 () ;
    return $events;
    } catch (Exception $e)
    die('Error:
    •$e-›getMessage () );
    } 
    */
?>
