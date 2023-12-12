<?php
class Config {
    public static function getConnexion() {
        $dsn = "mysql:host=localhost;dbname=rdv;charset=utf8";
        $username = "root";
        $password = "";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $conn = new PDO($dsn, $username, $password, $options);
            return $conn;
        } catch (PDOException $e) {
            die('Échec de la connexion à la base de données: ' . $e->getMessage());
        }
    }
}
?>
