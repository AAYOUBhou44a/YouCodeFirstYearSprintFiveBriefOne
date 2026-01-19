<?php
class User{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private int $age;
    private string $phone;

    public function __construct($id, $firstName, $lastName, $email, $age, $phone){
        $this->id = $id;
        $this->firstName = $firstName; 
        $this->lastName = $lastName;
        $this->email = $email;
        $this->age = $age;
        $this->phone = $phone;
    }
    public function setFirstName($firstName){
        if(empty($firstName)){
            throw new Exception("Le prénom ne peut pas etre vide");
        }
        $this->firstName = $firstName;
    }
    public function setLastName($lastName){
        if(empty($lastName)){
            throw new Exception("Le nop ne peut pas etre vide");
        }
        $this->lastName = $lastName;
    }
    public function setEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Veuillez entrer un email valid");
        }
        $this->email = $email;
    }
    public function setAge(){
        if($age <18 || $age > 120){
            throw new Exception("Age entré invalid");
        }
        $this->age = $age;
    }
    public function setPhone($phone){
        if(count($phone) < 10){
            throw new Exception("Nombre de téléphone invalide");
        }
        $this->phone = $phone;
    }


    public function getId(): int{
        return $this->id;
    }
    public function getFirstName(): string{
        return $this->firstName;
    }
    public function getLastName(): string{
        return $this->lastName;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getAge(): int{
        return $this->age;
    }
    public function getPhone(): string{
        return $this->phone;
    }
}


?>