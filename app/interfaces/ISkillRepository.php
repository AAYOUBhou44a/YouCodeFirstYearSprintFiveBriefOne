<?php
namespace App\Interfaces;

use App\Models\Skill;

interface ISkillRepository {
    public function getAll(): array;
    public function getById(int $id): ?Skill;
    public function add(Skill $skill): bool;
    public function update(Skill $skill): bool;
    public function delete(int $id): bool;
}