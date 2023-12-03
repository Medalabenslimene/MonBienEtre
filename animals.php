<?php
require '../config.php';

class AnimalC
{

    public function listanimals()
    {
        $sql = "SELECT * FROM animal";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function deleteAnimal($ide)
    {
        $sql = "DELETE FROM animal WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    
        // ... (unchanged code)
    
        function addAnimal($Animal)
        {
            $sql = "INSERT INTO animal (name1, species, treatable) VALUES (:name1, :species, :treatable)";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                // Get the selected species from the form
                $selectedSpecies = $_POST['species'];
    
                $query->execute([
                    'name1' => $Animal->getNom(),
                    'species' => $selectedSpecies,
                    'treatable' => $Animal->getTreatable(),
                ]);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    
        // ... (unchanged code)
    


    function showAnimal($id)
    {
        $sql = "SELECT * from Animal where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Animal = $query->fetch();
            return $Animal;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateanimal($Animal, $ide)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Animal SET 
                    name1 = :name1, 
                    species = :species, 
                    treatable = :treatable 
                WHERE id = :id'
            );
            
            $query->execute([
                'id' => $ide,
                'name1' => $Animal->getNom(),
                'species' => $Animal->getSpecies(),
                'treatable' => $Animal->getTreatable(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}