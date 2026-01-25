<?php
require __DIR__ . '/../vendor/autoload.php';

use Config\Database;
use Router\Router;
use App\Repositories\SqlUserRepository;
use App\Services\AuthService;

session_start();

// 1. Initialisation de la chaîne de dépendances
$db = Database::getInstance()->getConnection();
$userRepo = new SqlUserRepository($db);
$classRepo = new \App\Repositories\SqlClassRepository($db);
$sprintRepo = new \App\Repositories\SqlSprintRepository($db);
$skillRepo = new \App\Repositories\SqlSkillRepository($db);
$briefRepo = new \App\Repositories\SqlBriefRepository($db);
$evalRepo = new \App\Repositories\SqlEvaluationRepository($db); // Added
$authService = new AuthService($userRepo);

// 2. Routage
$page = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$page = trim($page, "/");

$router = new Router();
$path = $router->getPath($page);

// Sécurité si la route n'existe pas
if (!is_array($path)) {
    http_response_code(404);
    echo "Page non trouvée";
    exit;
}

$controllerClass = $path[0];
$methodName = $path[1];

// 3. Instanciation avec injection selon la classe
if ($controllerClass === 'App\Controllers\AuthController') {
    $controller = new $controllerClass($authService);
} elseif ($controllerClass === 'App\Controllers\AdminController') {
    $controller = new $controllerClass($classRepo, $sprintRepo, $userRepo, $skillRepo);
} elseif ($controllerClass === 'App\Controllers\TeacherController') {
    $controller = new $controllerClass($briefRepo, $sprintRepo, $skillRepo, $userRepo, $evalRepo);
} elseif ($controllerClass === 'App\Controllers\StudentController') {
    $controller = new $controllerClass($briefRepo, $sprintRepo, $evalRepo); // Added
} else {
    // Default fallback
    $controller = new $controllerClass();
}

// 4. Exécution
$controller->$methodName();