<?php

require_once __DIR__ . '/../bootstrap/app.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\User;
use App\Models\Fact;

$admin = User::create([
    'name' => 'Admin',
    'email' => 'admin@contradengue.com.br',
    'password' => password_hash('Z9Szopf0', PASSWORD_BCRYPT),
    'role' => 'admin',
    'status' => 'active']);

$admin->setUserEmailVerified();
$admin->save();

$someUser = User::create([
    'name' => 'User Test',
    'email' => 'user.test@contradengue.com.br',
    'password' => password_hash('aD7fMDle', PASSWORD_BCRYPT),
    'role' => 'user',
    'status' => 'active']);

$someUser->setUserEmailVerified();
$someUser->save();

$factA = Fact::create([
    'user_id' => $someUser->id,
    'option' => 'sintomas',
    'description' => 'febre, dor de cabeça, dor atrás dos olhos, dores musculares e articulares, erupção cutânea.',
    'picture' => 'foco_dengue_1.webp',
    'latitude' => -23.5505,
    'longitude' => -46.6333,
    'address' => 'São Paulo, SP'
]);

$factB = Fact::create([
    'user_id' => $someUser->id,
    'option' => 'foco_de_dengue',
    'description' => 'Aguas paradas, recipientes com água, pneus velhos, vasos de plantas.',
    'picture' => 'foco_dengue_2.webp',
    'latitude' => -23.5505,
    'longitude' => -42.6333,
    'address' => 'São Paulo, SP'
]);

$factC = Fact::create([
'user_id' => $someUser->getIdAttribute(),
    'option' => 'Outros',
    'description' => 'Sempre que houver água parada, o mosquito pode se reproduzir.',
    'picture' => 'foco_dengue_3.webp',
    'latitude' => -21.5505,
    'longitude' => -46.6333,
    'address' => 'São Paulo, SP'
]);

