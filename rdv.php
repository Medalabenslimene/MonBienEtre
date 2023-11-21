<?php

    require '../confirmation.php';

class rdv
{

    public function listrdv()
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

   function deleterdv($id)
    {
        $sql = "DELETE FROM rdv WHERE idJoueur = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
function addrdv($joueur)
    {
        $sql = "INSERT INTO rdv
        VALUES (id, :date,:heure, :description,:idu)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $rdv->getid(),
                'date' => $rdv->getdate(),
                'time' => $rdv->gettime(),
                'idu' => $rdv->getidu(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
}
