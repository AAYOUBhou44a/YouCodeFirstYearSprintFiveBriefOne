<?php
class Brief{
    private int $id;
    private string $title;
    private string $description;
    private string $text;
    private string $type;
    private int $sprintId;
    private int $classId;
    private DateTime $startDate;
    private DateTime $endDate;

    public function __construct($id, $title, $description, $text, $type, $sprintId, $classId, $startDate, $endDate){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->text = $text;
        $this->type = $type;
        $this->sprintId = $sprintId;
        $this->classId = $classId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function setTitle($title){
        if(empty($title)){
            throw new Exception("Le titre ne peux pas etre vide");
        }
            $this->title = $title;
    }

    public function setDescription($description){
        if(empty($description)){
            throw new Exception("La description de peut pas etre vide");
        }
        $this->description = $description;
    }

    public function setText($text){
        if(empty($text)){
            throw new Exception("Le text ne peut pas etre vide");
        }
        $this->text = $text;
    }

    public function setType($type){
        if($type != 'collectif' && $type != 'individuel'){
            throw new Exception("Type de brief invalid");
        }
        $this->type = $type;
    }

    public function setStartDate($startDate){
        if($startDate > $this->endDate){
            throw new Exception("La date de début ne peut pas etre après la date de la fin ");
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
    public function getTitle(): string{
        return $this->title;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getText(): string{
        return $this->text;
    }
    public function getType(): string{
        return $this->type;
    }
    public function getSprintId(): int{
        return $this->sprintId;
    }
    public function getClassId(): int{
        return $this->classId;
    }
    public function getStartDate(): DateTime{
        return $this->startDate;
    }
    public function getEndDate(): DateTime{
        return $this->endDate;  
    }
}

?>