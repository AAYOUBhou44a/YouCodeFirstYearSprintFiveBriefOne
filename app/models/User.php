<?php
abstract class User{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private int $age;
    private string $phone;
    private string $role;

    public function __construct($id, $firstName, $lastName, $email, $age, $phone, $role){
        $this->id = $id;
        $this->setFirstName($firstName); 
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setAge($age);
        $this->setPhone($phone);
        $this->role = $role;
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
    public function setAge($age){
        if($age <18 || $age > 120){
            throw new Exception("Age entré invalid");
        }
        $this->age = $age;
    }
    public function setPhone($phone){
        if(strlen($phone) < 10){
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
    public function getRole(): string{
        return $this->role;
    }
}


?>