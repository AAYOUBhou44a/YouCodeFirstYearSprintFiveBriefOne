<?php
namespace App\Controllers;

use App\Services\AuthService;

class AuthController extends Controller {
    private AuthService $authService;

    public function __construct(AuthService $authService) {
        parent::__construct();
        $this->authService = $authService;
    }

    public function showLogin() {
        $this->render('auth/login.html.twig');
    }

    public function submitLogin() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $password = trim($_POST["password"]);

            if (!$email || empty($password)) {
                echo "Champs invalides";
                return;
            }

            // Utilisation de la propriété injectée
            $user = $this->authService->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: /debriefing/home");
                exit();
            } else {
                echo "Échec de connexion";
            }
        }
    }
    public function logout() {
        session_destroy();
        header("Location: /debriefing/login");
        exit;
    }
}