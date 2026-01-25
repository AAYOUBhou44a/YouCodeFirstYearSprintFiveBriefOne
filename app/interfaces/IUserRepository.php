<?php
namespace App\Interfaces;

// Import de l'entité si elle existe, sinon utilise array
use App\Models\User; 

interface IUserRepository {
    public function getAll(): array;
    
    // Le ? signifie que la méthode peut retourner User OU null (si non trouvé)
    public function getById(int $id): ?User; 
    
    public function getByClass(int $class_id): array;
    
    // Pour l'ajout, on passe souvent un objet ou un tableau de données, ici restons sur User abstract si possible ou data array
    // requirement says "Admin creates user", so passed via data array usually fine, or User object?
    // Let's stick to array data for creating, but return Object for retrieval.
    public function add(array $data): bool;
    
    public function getByRole(string $role): array;
    
    public function delete(int $id): bool;

    // Renommé findByEmail pour la clarté (utilisé pour l'authentification)
    public function findByEmail(string $email): ?User;
}