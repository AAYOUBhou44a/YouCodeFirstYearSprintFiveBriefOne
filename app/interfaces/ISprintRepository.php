<?php
interface ISprintRepository{
    public function gelAll(): array;
    public function getById($id): ?Sprint;
    public function add(Sprint $sprint): bool;
    public function update(Sprint $sprint): bool;
    public function delete($id): bool;
}

?>