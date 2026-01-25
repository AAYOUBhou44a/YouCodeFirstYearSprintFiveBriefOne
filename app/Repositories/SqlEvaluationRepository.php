<?php
namespace App\Repositories;

use App\Interfaces\IEvaluationRepository;
use App\Models\Evaluation;
use PDO;
use Exception;

class SqlEvaluationRepository implements IEvaluationRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getByBriefAndStudent(int $briefId, int $studentId): array {
        $stmt = $this->db->prepare("SELECT * FROM student_evaluations WHERE brief_id = :bid AND student_id = :sid");
        $stmt->execute(['bid' => $briefId, 'sid' => $studentId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $evals = [];
        foreach ($rows as $row) {
            $evals[] = new Evaluation(
                $row['id'],
                $row['student_id'],
                $row['brief_id'],
                $row['skill_id'],
                $row['level'],
                $row['comment'],
                $row['evaluated_by']
            );
        }
        return $evals;
    }

    public function save(Evaluation $eval): bool {
        // Upsert logic (PostgreSQL)
        $sql = "INSERT INTO student_evaluations (student_id, brief_id, skill_id, level, comment, evaluated_by)
                VALUES (:sid, :bid, :skid, :lvl::mastery_level, :comm, :eval_by)
                ON CONFLICT (student_id, brief_id, skill_id) 
                DO UPDATE SET level = EXCLUDED.level, comment = EXCLUDED.comment, evaluated_by = EXCLUDED.evaluated_by";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'sid' => $eval->getStudentId(),
            'bid' => $eval->getBriefId(),
            'skid' => $eval->getSkillId(),
            'lvl' => $eval->getLevel(),
            'comm' => $eval->getComment(),
            'eval_by' => $eval->getEvaluatedBy()
        ]);
    }
}
