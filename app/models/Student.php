<?php
class Student extends User{
    private int $classId;

    public function __construct($id, $firstName, $lastName, $email, $age, $phone, $classId){
        parent::__construct($id, $firstName, $lastName, $email, $age, $phone, "student");

        $this->classId = $classId;
    }

    public function getClassId(){
        return $this->classId;
    }
}

?>