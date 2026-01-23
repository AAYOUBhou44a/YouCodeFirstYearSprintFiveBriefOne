<?php
interface ISkillRepository{
    public function getAll(): array;
    public function getById($id): ?Skill;
    public function add(Skill $skill): bool;
    public function update(Skill $skill): bool;
    public function delete($id): bool;
}
?>