<?php

use Bramus\Router\Router;
use App\Models\User;

$router = new Router();

$router->post('/users', function () {
    $data = json_decode(file_get_contents('php://input'), true);
    $user = User::create($data);
    echo json_encode($user);
});

$router->run();