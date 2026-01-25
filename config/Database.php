<?php
namespace Config;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $connection = null;

    private function __construct() {
        try {
            // Changement pour PostgreSQL
            // Driver: pgsql | Port par défaut: 5432
            $this->connection = new PDO(
                "pgsql:host=localhost;port=5432;dbname=debriefing",
                "postgres",
                "AUB321*treza" // Ajoute ton mot de passe ici s'il y en a un
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion PostgreSQL : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}