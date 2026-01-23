<?php
interface IUserRepository{
    public function getAll(): array;
    // array retourne un tableau , si la base de donnés est vide il va retourner un tableau vide 
    public function getById($id): ?User;
    public function getByClass($class_id): array;
    public function add(User $user): bool;
    // bool retourne true ou false 
    public function getByRole($role): array;
    public function delete($id): bool;
}
?>