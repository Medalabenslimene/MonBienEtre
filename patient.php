<?php

include_once "../../config.php";

class Patient {
    // Attributs
    private $id_patient;
    private $nom;
    private $prenom;
    private $age;
    private $email;
    private $password;
    private $telephone;
    private $genre;

    // Constructeur sans paramètres
    public function __construct() {}

    // Méthode pour définir les valeurs des attributs
    public function setValues($nom, $prenom, $age, $email, $password, $telephone, $genre) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->genre = $genre;
    }

    // Getter et setter pour chaque attribut

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

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
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

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
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
            $query = "INSERT INTO patients (nom, prenom, age, email, password, telephone, genre) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Préparer la déclaration SQL
            $statement = $db->prepare($query);

            // Lier les valeurs
            $statement->bindParam(1, $this->nom);
            $statement->bindParam(2, $this->prenom);
            $statement->bindParam(3, $this->age);
            $statement->bindParam(4, $this->email);
            $statement->bindParam(5, $this->password);
            $statement->bindParam(6, $this->telephone);
            $statement->bindParam(7, $this->genre);

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
