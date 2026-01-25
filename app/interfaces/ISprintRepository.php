<?php
namespace App\Interfaces;

use App\Models\Sprint;

interface ISprintRepository {
    public function getAll(): array;
    public function getById($id): ?Sprint;
    public function getByClassId(int $classId): array; // Returns array of Sprint
    public function add(Sprint $sprint): bool;
    public function update(Sprint $sprint): bool;
    public function delete($id): bool;
}
?>