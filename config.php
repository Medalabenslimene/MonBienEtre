<?php

class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=sitesante6',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
                // Log the successful connection (you can replace this with your preferred logging method)
                error_log('Connected to the database successfully');
            } catch (Exception $e) {
                // Log the error and handle it gracefully (you can replace this with your preferred logging method)
                error_log('Database connection error: ' . $e->getMessage());
                // Handle the error gracefully (you might want to throw an exception or return an error response)
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}







config::getConnexion();