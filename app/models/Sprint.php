<?php

class Sprint{
    private int $id;
    private string $name;
    private DateTime $startDate;
    private DateTime $endDate;

    public function __construct(int $id, string $name, DateTime $startDate, DateTime $endDate){
        $this->id = $id;
        $this->name = $name;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function setName($name){
        if(empty($name)){
            throw new Exception("Le titre du sprint ne peut pas etre vide");
        }
        $this->name = $name;
    }
    public function setStartDate($startDate){
        if($startDate > $this->endDate){
            throw new Exception("La date de début ne peut pas etre après la date de fin");
        }
        $this->startDate = $startDate;
    }
    public function setEndDate($endDate){
        if($endDate < $this->startDate){
            throw new Exception("La date de fin ne peut pas etre avant la date de début");
        }
        $this->endDate = $endDate;
    }


    public function getId(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getStartDate(): DateTime{
        return $this->startDate;
    }
    public function getEndDate(): DateTime{
        return $this->endDate;
    }
}

?>