<?php
namespace App\Repositories;

use App\Interfaces\IClassRepository;
use App\Models\Classe;
use PDO;
use Exception;

class SqlClassRepository implements IClassRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM classes ORDER BY name");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $classes = [];
        foreach ($rows as $row) {
            $classes[] = new Classe(
                $row['id'],
                $row['name'],
                $row['teacher_id'] // Ensure column name matches schema (teacher_id)
            );
        }
        return $classes;
    }

    public function getClassByTeacherId(int $id): ?Classe {
        $stmt = $this->db->prepare("SELECT * FROM classes WHERE teacher_id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Classe($row['id'], $row['name'], $row['teacher_id']);
        }
        return null;
    }

    public function addClass(Classe $classe): bool {
        // ID is serial, so we don't insert it. Model might have 0 or null.
        // But constructor requires ID. Usually we pass 0 for new objects or make ID optional/nullable.
        // Assuming we pass mock ID or ignore it in INSERT.
        $stmt = $this->db->prepare("INSERT INTO classes (name, teacher_id) VALUES (:name, :teacher_id)");
        return $stmt->execute([
            'name' => $classe->getName(),
            'teacher_id' => $classe->getTeacherId()
        ]);
    }

    public function updateClass(Classe $classe): bool {
        $stmt = $this->db->prepare("UPDATE classes SET name = :name, teacher_id = :teacher_id WHERE id = :id");
        return $stmt->execute([
            'name' => $classe->getName(),
            'teacher_id' => $classe->getTeacherId(),
            'id' => $classe->getId()
        ]);
    }

    public function deleteClass($id): bool {
        $stmt = $this->db->prepare("DELETE FROM classes WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getById(int $id): ?Classe {
        $stmt = $this->db->prepare("SELECT * FROM classes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Classe($row['id'], $row['name'], $row['teacher_id']);
        }
        return null;
    }
}
