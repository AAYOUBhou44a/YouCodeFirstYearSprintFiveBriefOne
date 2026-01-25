namespace App\Models;

use Exception;

class Evaluation {
    private int $id;
    private int $studentId;
    private int $briefId;
    private int $skillId;
    private string $level;
    private ?string $comment;
    private int $evaluatedBy;

    public function __construct(int $id, int $studentId, int $briefId, int $skillId, string $level, ?string $comment, int $evaluatedBy) {
        $this->id = $id;
        $this->studentId = $studentId;
        $this->briefId = $briefId;
        $this->skillId = $skillId;
        $this->setLevel($level);
        $this->comment = $comment;
        $this->evaluatedBy = $evaluatedBy;
    }

    public function setLevel(string $level) {
        $allowedLevels = ['IMITER', 'S_ADAPTER', 'TRANSPOSER'];
        if (!in_array($level, $allowedLevels)) {
            // throw new Exception("Niveau invalide: " . $level); 
            // Allow case toggle?
            $level = strtoupper($level);
            if (!in_array($level, $allowedLevels)) {
                 throw new Exception("Niveau invalide");
            }
        }
        $this->level = $level;
    }

    public function getId(): int { return $this->id; }
    public function getStudentId(): int { return $this->studentId; }
    public function getBriefId(): int { return $this->briefId; }
    public function getSkillId(): int { return $this->skillId; }
    public function getLevel(): string { return $this->level; }
    public function getComment(): ?string { return $this->comment; }
    public function getEvaluatedBy(): int { return $this->evaluatedBy; }
}

?>