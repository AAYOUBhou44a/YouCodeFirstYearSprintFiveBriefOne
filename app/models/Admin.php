<?php
class Admin extends User{
    public function __construct($id, $firstName, $lastName, $email, $age, $phone){
        parent::__construct($id, $firstName, $lastName, $email, $age, $phone, "admin");
    }
}


?>