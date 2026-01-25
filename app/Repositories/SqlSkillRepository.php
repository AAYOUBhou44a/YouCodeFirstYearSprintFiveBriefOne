<?php
namespace App\Repositories;

use App\Interfaces\ISkillRepository;
use App\Models\Skill;
use PDO;
use Exception;

class SqlSkillRepository implements ISkillRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM skills ORDER BY code");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $skills = [];
        foreach ($rows as $row) {
            $skills[] = new Skill($row['id'], $row['code'], $row['title']);
        }
        return $skills;
    }

    public function getById(int $id): ?Skill {
        $stmt = $this->db->prepare("SELECT * FROM skills WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Skill($row['id'], $row['code'], $row['title']);
        }
        return null;
    }

    public function add(Skill $skill): bool {
        $stmt = $this->db->prepare("INSERT INTO skills (code, title) VALUES (:code, :title)");
        return $stmt->execute([
            'code' => $skill->getCode(),
            'title' => $skill->getTitle()
        ]);
    }

    public function update(Skill $skill): bool {
        $stmt = $this->db->prepare("UPDATE skills SET code = :code, title = :title WHERE id = :id");
        return $stmt->execute([
            'code' => $skill->getCode(),
            'title' => $skill->getTitle(),
            'id' => $skill->getId()
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM skills WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
