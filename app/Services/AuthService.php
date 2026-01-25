<?php
namespace App\Services;

// Importation de l'interface car elle est dans un autre dossier
use App\Interfaces\IUserRepository;

class AuthService {
    private IUserRepository $userRepo;

    /**
     * On injecte l'interface. 
     * PHP acceptera n'importe quelle classe qui "implements IUserRepository"
     */
    public function __construct(IUserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function login(string $email, string $password) {
        // Recherche de l'utilisateur via le repo
        $user = $this->userRepo->findByEmail($email);

        // Vérification sécurisée du mot de passe
        if ($user && password_verify($password, $user->getPassword())) {
            // Optionnel : On retire le mot de passe avant de retour, mais on retourne l'objet
            // return $user;
            return $user;
        }

        return false;
    }
}