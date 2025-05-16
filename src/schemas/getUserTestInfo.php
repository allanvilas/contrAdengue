<?php

require_once __DIR__ . '/../bootstrap/app.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Fact.php';

use App\Model\User;
use App\Model\Fact;


echo "Verificando se o usuario existe...\n";
$user = User::where('name', 'User Test')->first();
echo "Usuario encontrado: " . $user->name . "\n";
echo "Id: " . $user->id . "\n";
