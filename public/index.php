<?php
 
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../bootstrap.php';

// Routing semplice
$action = $_GET['action'] ?? 'play';

// Istanzia il controller
$controller = new App\Controllers\GameController();

// Chiama l'azione appropriata
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Pagina non trovata";
    exit;
}