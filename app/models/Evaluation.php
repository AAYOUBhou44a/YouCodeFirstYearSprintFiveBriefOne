<?php
class Evaluation{
    private int $briefId;
    private int $skillId;
    private string $level;

    public function __construct($briefId, $skillId, $level){
        $this->setBriefId($briefId);
        $this->setSkillId($skillId);
        $this->setLevel($level);
    }
    
    public function setBriefId($briefId){
        if($briefId < 0){
            throw new Exception("Id de brief invalid");
        }
        $this->briefId = $briefId;
    }
    public function setSkillId($skillId){
        if($skillId < 0){
            throw new Exception("Id de skill invalid");
        }
        $this->skillId = $skillId;
    }
    public function setLevel($level){
        $allowedLevels = ['Imiter', 's_adapter', 'transposer'];
        if(!in_array($level, $allowedLevels)){
            throw new Exception("Nom de level invald");
        }
        $this->level = $level;
    }


    public function getBriefId(){
        return $this->brieId;
    }
    public function getSkillId(){
        return $this->skillId;
    }
    public function getTeacherId(){
        return $this->teacherId;
    }
}

?>