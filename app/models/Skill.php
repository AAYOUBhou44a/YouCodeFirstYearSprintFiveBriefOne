<?php
class Skill{
    private int $id;
    private string $code;
    private string $title;

    public function __construct($id, $code, $title){
        $this->id = $id;
        $this->setCode($code);
        $this->setTitle($title);
    }

    public function setCode($code){
        if(empty(trim($code))){
            throw new Exception("Le code de la compétence ne peut pas etre vide");
        }
        $this->code = $code;
    }

    public function setTitle($title){
        if(empty(trim($title))){
            throw new Exception("Le titre de la compétence ne peut pas etre vide");
        }
        $this->title = $title;
    }

    public function getId(){
        return $this->id;
    }
    public function getCode(){
        return $this->code;
    }
    public function getTitle(){
        return $this->title;
    }
}


?>