<?php
interface IbriefRepository{
    public function getAll(): array;
    public function getById($id): ?Brief;
    public function add(Brief $brief): bool;
    public function update(Brief $brief): bool;
    public function delete($id): bool;
    public function getSkillsByBrief($id): array;
}
?>
