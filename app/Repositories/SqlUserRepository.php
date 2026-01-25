<?php
namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use PDO;

class SqlUserRepository implements IUserRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function hydrate(array $row): ?User {
        if (!$row) return null;
        
        $id = $row['id'];
        $first = $row['first_name'];
        $last = $row['last_name'];
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role']; // ENUM value

        switch ($role) {
            case 'admin':
                return new Admin($id, $first, $last, $email, $password);
            case 'teacher':
                return new Teacher($id, $first, $last, $email, $password);
            case 'student':
                $classId = isset($row['class_id']) ? (int)$row['class_id'] : null;
                return new Student($id, $first, $last, $email, $password, $classId);
            default:
                return null;
        }
    }

    public function findByEmail(string $email): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->hydrate($row) : null;
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY last_name, first_name");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($rows as $row) {
            $user = $this->hydrate($row);
            if ($user) $users[] = $user;
        }
        return $users;
    }

    public function getById(int $id): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->hydrate($row) : null;
    }

    public function getByClass(int $class_id): array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE class_id = :class_id ORDER BY last_name");
        $stmt->execute(['class_id' => $class_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($rows as $row) {
            $user = $this->hydrate($row);
            if ($user) $users[] = $user;
        }
        return $users;
    }

    public function add(array $data): bool {
        // Data contains: first_name, last_name, email, password, role, class_id (opt)
        $sql = "INSERT INTO users (first_name, last_name, email, password, role, class_id) 
                VALUES (:first_name, :last_name, :email, :password, :role, :class_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'], // Already hashed in Controller/Service
            'role' => $data['role'],
            'class_id' => $data['class_id'] ?? null
        ]);
    }

    public function getByRole(string $role): array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE role = :role ORDER BY last_name");
        $stmt->execute(['role' => $role]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($rows as $row) {
            $user = $this->hydrate($row);
            if ($user) $users[] = $user;
        }
        return $users;
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}