<?php
interface IClassRepository{
    public function getAll(): array;
    public function getClassByTeacherId($id): ?Classe;
    public function addClass(Classe $classe): bool;
    public function updateClass(Classe $classe): bool;
    public function deleteClass($id): bool;
}


?>