<?php

include_once "../../config.php";

class Doctor {
    // Attributs
    private $id_docteur;
    private $nom;
    private $prenom;
    private $telephone;
    private $adresse;
    private $email;
    private $password;
    private $specialite;

    // Constructeur sans paramètres
    public function __construct() {}

    // Méthode pour définir les valeurs des attributs
    public function setValues($nom, $prenom, $telephone, $adresse, $email, $password, $specialite) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->password = $password;
        $this->specialite = $specialite;
    }

    // Getter et setter pour chaque attribut

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

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $this->hashPassword($password);
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

    // Méthode pour hacher le mot de passe
    private function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Méthode pour vérifier un mot de passe haché
    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    public function save() {
        try {
            $db = $GLOBALS['db'];

            // Préparer la requête SQL
            $query = "INSERT INTO doctors (nom, prenom, telephone, adresse, email, password, specialite) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Préparer la déclaration SQL
            $statement = $db->prepare($query);

            // Lier les valeurs
            $statement->bindParam(1, $this->nom);
            $statement->bindParam(2, $this->prenom);
            $statement->bindParam(3, $this->telephone);
            $statement->bindParam(4, $this->adresse);
            $statement->bindParam(5, $this->email);
            $statement->bindParam(6, $this->password);
            $statement->bindParam(7, $this->specialite);

            // Exécuter la requête
            $result = $statement->execute();

            // Fermer la connexion à la base de données
            $db = null;

            return $result;
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            echo "Erreur de base de données : " . $e->getMessage();
            return false;
        }
    }
}

?>
