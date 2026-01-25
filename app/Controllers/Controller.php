<?php
namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller {
    protected $twig;

    public function __construct() {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $this->twig = new Environment($loader, [
            'cache' => false, // Set to 'cache' directory in production
            'debug' => true,
        ]);
    }

    protected function render(string $view, array $data = []) {
        echo $this->twig->render($view, $data);
    }
}
