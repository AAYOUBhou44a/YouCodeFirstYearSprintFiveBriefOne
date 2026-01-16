<?php
require __DIR__ . '/../vendor/autoload.php';

use Router\Router; 

session_start();

include __DIR__ . "/../views/layout/header.php";

$page = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$page = trim($page, "/");

$router = new Router();
$path = $router->getPath($page);

include __DIR__ . "/../$path.php";

include __DIR__ . "/../views/layout/footer.php";

?>