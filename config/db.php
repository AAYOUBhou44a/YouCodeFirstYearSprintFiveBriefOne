<?php

class Database {
    private static $instance = null;
    
    private $connection = null;

// Pas besoin de "if", le constructeur n'est appelé qu'une fois par le Singleton
    private function __construct(){
        try{
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=debriefing;charset=utf8",
                "root",
                ""
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOEXECTION $e){
            die("Erreur  de connection : " . $e->getMessage());
            // die nous donne l'erreur et exit immédiatemment 
        }
        }

        // un constructeur ne doit jamais retourner de valeur son role et de préparer l' objet 


    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }

}


?>


<!-- exemple de son utilisation  -->
<!-- $dbInstance = Database::getInstance();
$pdo = $dbInstance->getConnection(); -->