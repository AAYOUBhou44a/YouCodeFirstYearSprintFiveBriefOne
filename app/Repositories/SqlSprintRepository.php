<?php
namespace App\Repositories;

use App\Interfaces\ISprintRepository;
use App\Models\Sprint;
use PDO;
use Exception;
use DateTime;

class SqlSprintRepository implements ISprintRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM sprints ORDER BY start_date DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sprints = [];
        foreach ($rows as $row) {
            $sprints[] = new Sprint(
                $row['id'],
                $row['name'],
                new DateTime($row['start_date']),
                new DateTime($row['end_date'])
                // Assuming Sprint model constructor is consistent with this
            );
        }
        return $sprints;
    }

    public function getById($id): ?Sprint {
        $stmt = $this->db->prepare("SELECT * FROM sprints WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Sprint(
                $row['id'],
                $row['name'],
                new DateTime($row['start_date']),
                new DateTime($row['end_date']),
                $row['class_id']
            );
        }
        return null;
    }

    public function getByClassId(int $classId): array {
        $stmt = $this->db->prepare("SELECT * FROM sprints WHERE class_id = :class_id ORDER BY start_date DESC");
        $stmt->execute(['class_id' => $classId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sprints = [];
        foreach ($rows as $row) {
            $sprints[] = new Sprint(
                $row['id'],
                $row['name'],
                new DateTime($row['start_date']),
                new DateTime($row['end_date']),
                $row['class_id']
            );
        }
        return $sprints;
    }

    public function add(Sprint $sprint): bool {
        $stmt = $this->db->prepare("INSERT INTO sprints (name, start_date, end_date, class_id) VALUES (:name, :start, :end, :class_id)");
        return $stmt->execute([
            'name' => $sprint->getName(),
            'start' => $sprint->getStartDate()->format('Y-m-d'),
            'end' => $sprint->getEndDate()->format('Y-m-d'),
            'class_id' => $sprint->getClassId()
        ]);
    }

    public function update(Sprint $sprint): bool {
        $stmt = $this->db->prepare("UPDATE sprints SET name = :name, start_date = :start, end_date = :end, class_id = :class_id WHERE id = :id");
        return $stmt->execute([
            'name' => $sprint->getName(),
            'start' => $sprint->getStartDate()->format('Y-m-d'),
            'end' => $sprint->getEndDate()->format('Y-m-d'),
            'class_id' => $sprint->getClassId(),
            'id' => $sprint->getId()
        ]);
    }

    public function delete($id): bool {
        $stmt = $this->db->prepare("DELETE FROM sprints WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
