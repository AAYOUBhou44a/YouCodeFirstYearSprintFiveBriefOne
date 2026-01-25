<?php
namespace App\Models;

use Exception;

class Classe {
    private int $id;
    private string $name;
    private int $teacherId;

    public function __construct($id, $name, $teacherId){
        $this->id = $id;
        $this->setName($name);
        $this->setTeacherId($teacherId);
    }

    public function setName(string $name){
        if(empty(trim($name))){
            throw new Exception("Le nom du classe ne peut pas etre vide");
        }
        $this->name = $name;
    }
    public function setTeacherId($teacherId){
        if($teacherId < 0){
            throw new Exception("Id de prof invalid");
        }
        $this->teacherId = $teacherId;
    }

    public function getId(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getTeacherId(): int{
        return $this->teacherId;
    }
}
