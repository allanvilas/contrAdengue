<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap/app.php';

use Bramus\Router\Router;

$router = new Router();

// Rota da landing page
$router->get('/', function () {
    require __DIR__ . '/../views/landing.php';
});

$router->get('/login', function () {
    require __DIR__ . '/../views/login.php';
});

$router->post('/plataforma', function () {
    require __DIR__ . '/../views/plataforma.php';
});

$router->post('/debug', function () {
    require __DIR__ . '/../views/debug.php';
});

// // Login
// $router->get('/login', function () {
//     require __DIR__ . '/../app/Views/login.php';
// });

// // API simples
// $router->get('/api/usuarios', function () {
//     $usuarios = \App\Models\User::all();
//     header('Content-Type: application/json');
//     echo json_encode($usuarios);
// });

$router->run();
