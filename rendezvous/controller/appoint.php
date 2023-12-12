<?php
require __DIR__ . '/../model/config.php';

class RDVC
{

    public function listRDVs()
    {
        $sql = "SELECT * FROM rdv";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteRDV($id_rdv)
    {
        $sql = "DELETE FROM rdv WHERE id_rdv = :id_rdv";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rdv', $id_rdv, PDO::PARAM_INT);  // Assuming id_rdv is an integer
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function addRDV($rdv)
    {
        $sql = "INSERT INTO rdv  
        VALUES (idrdv, :specialite, :date, :heure, :description, :id_user)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'specialite' => $rdv->getSpecialite(),
                'date' => $rdv->getDate(),
                'heure' => $rdv->getHeure(),
                'description' => $rdv->getDescription(),
                'id_user' => $rdv->getIdUser(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showRDV($id_rdv)
{
    $sql = "SELECT * FROM rdv WHERE id_rdv = :id_rdv";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_rdv', $id_rdv, PDO::PARAM_INT);
        $query->execute();
        $rdv = $query->fetch();
        return $rdv;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    function updateRDV($rdv, $id_rdv)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE rdv SET 
                    specialite = :specialite, 
                    date = :date, 
                    heure = :heure, 
                    description = :description, 
                    id_user = :id_user
                WHERE id_rdv = :id_rdv'
            );
            
            $query->execute([
                'id_rdv' => $id_rdv,
                'specialite' => $rdv->getSpecialite(),
                'date' => $rdv->getDate(),
                'heure' => $rdv->getHeure(),
                'description' => $rdv->getDescription(),
                'id_user' => $rdv->getIdUser(),
            ]);
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        function  listRDVsByDate()
        {
            $sql = "SELECT * FROM rdv ORDER BY date ASC"; // Trie par date dans l'ordre croissant (ASC)
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
    
        
    }
}
?>