<?php

include_once "../../config.php";

class Patient {
    // Attributes
    private $id_patient;
    private $nom;
    private $prenom;
    private $telephone;
    private $email;
    private $genre;
    private $heure_rdv;

    // Constructor without parameters
    public function __construct() {}

    // Method to set attribute values
    public function setValues($nom, $prenom, $telephone, $email, $genre, $heure_rdv) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->specialite = $genre;
        $this->heure_depart = $heure_rdv;
    }

    // Getters and setters for each attribute

    public function getIdPatient() {
        return $this->id_patient;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getgenre() {
        return $this->genre;
    }

    public function setgenre($genre) {
        $this->genre = $genre;
    }

    public function getHeure_rdv() {
        return $this->getHeure_rdv;
    }

    public function setHeure_rdv($heure_rdv) {
        $this->heure_rdv = $heure_rdv;
    }

    // Method to save the patient in the database
    public function save() {
        try {
            $db = $GLOBALS['db'];

            // Prepare the SQL query
            $query = "INSERT INTO patient (nom, prenom, telephone, email, genre, heure_rdv) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare the SQL statement
            $statement = $db->prepare($query);

            // Bind values
            $statement->bindParam(1, $this->nom);
            $statement->bindParam(2, $this->prenom);
            $statement->bindParam(3, $this->telephone);
            $statement->bindParam(4, $this->email);
            $statement->bindParam(5, $this->genre);
            $statement->bindParam(6, $this->getHeure_rdv);

            // Execute the query
            $result = $statement->execute();

            // Close the database connection
            $db = null;

            return $result;
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
}
?>
