<?php

include_once "../../config.php";

class Docteur {
    // Attributes
    private $id_docteur;
    private $nom;
    private $prenom;
    private $telephone;
    private $email;
    private $specialite;
    private $heure_depart;

    // Constructor without parameters
    public function __construct() {}

    // Method to set attribute values
    public function setValues($nom, $prenom, $telephone, $email, $specialite, $heure_depart) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->specialite = $specialite;
        $this->heure_depart = $heure_depart;
    }

    // Getters and setters for each attribute

    public function getIdDocteur() {
        return $this->id_docteur;
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

    public function getspecialite() {
        return $this->specialite;
    }

    public function setspecialite($specialite) {
        $this->specialite = $specialite;
    }

    public function getHeure_depart() {
        return $this->heure_depart;
    }

    public function setHeure_depart($heure_depart) {
        $this->heure_depart = $heure_depart;
    }

    // Method to save the docteur in the database
    public function save() {
        try {
            $db = $GLOBALS['db'];

            // Prepare the SQL query
            $query = "INSERT INTO docteur (nom, prenom, telephone, email, specialite, heure_depart) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare the SQL statement
            $statement = $db->prepare($query);

            // Bind values
            $statement->bindParam(1, $this->nom);
            $statement->bindParam(2, $this->prenom);
            $statement->bindParam(3, $this->telephone);
            $statement->bindParam(4, $this->email);
            $statement->bindParam(5, $this->specialite);
            $statement->bindParam(6, $this->heure_depart);

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
