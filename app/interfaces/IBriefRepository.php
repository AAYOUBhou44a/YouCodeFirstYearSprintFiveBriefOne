<?php
namespace App\Interfaces;

use App\Models\Brief;

interface IBriefRepository {
    public function getAll(): array;
    public function getBySprintId(int $sprintId): array;
    public function getById(int $id): ?Brief;
    public function add(Brief $brief, array $skillIds): int; // Returns ID of new brief
    public function update(Brief $brief, array $skillIds): bool;
    public function delete(int $id): bool;
    public function getSkillsByBrief(int $id): array;
}
