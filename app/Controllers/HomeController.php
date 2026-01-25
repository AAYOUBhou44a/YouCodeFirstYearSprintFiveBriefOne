<?php
namespace App\Controllers;

class HomeController extends Controller {
    public function index() {
        // Check session, redirect based on role?
        // For now just render a dashboard placeholder
        $user = $_SESSION['user'] ?? null;
        if (!$user) {
            header("Location: /debriefing/login");
            exit;
        }

        $this->render('home.html.twig', ['user' => $user]);
    }
}
