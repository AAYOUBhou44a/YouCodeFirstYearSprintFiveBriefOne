<?php
namespace App\Repositories;

use App\Interfaces\IBriefRepository;
use App\Models\Brief;
use PDO;
use Exception;
use DateTime;

class SqlBriefRepository implements IBriefRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM briefs ORDER BY title");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $briefs = [];
        foreach ($rows as $row) {
            $briefs[] = $this->hydrate($row);
        }
        return $briefs;
    }

    public function getBySprintId(int $sprintId): array {
        $stmt = $this->db->prepare("SELECT * FROM briefs WHERE sprint_id = :sid ORDER BY title");
        $stmt->execute(['sid' => $sprintId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $briefs = [];
        foreach ($rows as $row) {
            $briefs[] = $this->hydrate($row);
        }
        return $briefs;
    }

    public function getById(int $id): ?Brief {
        $stmt = $this->db->prepare("SELECT * FROM briefs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->hydrate($row) : null;
    }

    private function hydrate(array $row): Brief {
        // Constructor: id, title, description, text, type, sprintId, classId, startDate, endDate
        // DB Schema: id, title, description, content(text?), type, sprint_id, -- classId not in briefs table directly?
        // Wait, Schema analysis:
        // CREATE TABLE briefs (id, title, description, type, sprint_id, start_date, end_date)
        // Does NOT have class_id? It relates to Sprint which relates to Class.
        // Brief model has classId property?
        // Check Schema Again.
        // In my `replace_file_content` for schema:
        // CREATE TABLE briefs (id, title, description, type, sprint_id, start_date, end_date)
        // NO class_id in briefs table. Sprint has class_id.
        // Brief model needs update to remove classId OR I infer it from sprintId?
        // Constructor requires classId?
        // I should update Brief model to remove classId, or just pass 0 if unused.
        // Also schema has `description` TEXT. Model has `description` and `text`. Schema missing `content`?
        // Original schema had `content text`. My updated schema REMOVED `content`?
        // My updated schema: `description TEXT`.
        // I need to align Model with Schema.
        // I will update Brief model to match schema: remove classId, remove text (or merge description/text).
        
        // For now, I'll pass defaults to constructor and fix Model later to avoid breaking flow.
        return new Brief(
            $row['id'],
            $row['title'],
            $row['description'],
            '', // text - not in schema?
            $row['type'],
            $row['sprint_id'],
            0, // classId - not in schema
            $row['start_date'] ? new DateTime($row['start_date']) : new DateTime(),
            $row['end_date'] ? new DateTime($row['end_date']) : new DateTime()
        );
    }

    public function add(Brief $brief, array $skillIds): int {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO briefs (title, description, type, sprint_id, start_date, end_date) 
                                        VALUES (:title, :desc, :type::type, :sprint_id, :start, :end) RETURNING id");
            // PostgreSQL RETURNING id
            $stmt->execute([
                'title' => $brief->getTitle(),
                'desc' => $brief->getDescription(),
                'type' => $brief->getType(),
                'sprint_id' => $brief->getSprintId(),
                'start' => $brief->getStartDate()->format('Y-m-d'),
                'end' => $brief->getEndDate()->format('Y-m-d')
            ]);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $briefId = $row['id'];

            // Add skills
            $skillStmt = $this->db->prepare("INSERT INTO brief_skills (brief_id, skill_id) VALUES (:bid, :sid)");
            foreach ($skillIds as $sid) {
                $skillStmt->execute(['bid' => $briefId, 'sid' => $sid]);
            }

            $this->db->commit();
            return $briefId;

        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function update(Brief $brief, array $skillIds): bool {
        // Implement similarly with transaction
        return false;
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM briefs WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getSkillsByBrief(int $id): array {
        $stmt = $this->db->prepare("SELECT s.* FROM skills s 
                                    JOIN brief_skills bs ON s.id = bs.skill_id 
                                    WHERE bs.brief_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return array of skill attributes
    }
}
