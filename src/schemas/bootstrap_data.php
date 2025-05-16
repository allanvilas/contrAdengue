<?php

require_once __DIR__ . '/../bootstrap/app.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Fact.php';
require_once 'users_table.php';
require_once 'facts_table.php';

use App\Model\User;
use App\Model\Fact;

$someUser = null;
$admin = null;

if (User::where('name', 'Admin')->exists()) {
    echo "Admin ja existe. Pulando criacao do admin.\n";
} else {
    echo "criando o usuario admin com senha Z9Szopf0...\n";
    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@contradengue.com.br',
        'password' => password_hash('Z9Szopf0', PASSWORD_BCRYPT),
        'role' => 'admin',
        'status' => 1
    ]);

    $admin->setUserEmailVerified();

    $admin->save();
}

if (User::where('name', 'User Test')->exists()) {
    echo "User Test ja existe. Pulando criacao do User Test.\n";
    $someUser = User::where('name', 'User Test')->first();
} else {
    echo "criando o usuario User Test com senha aD7fMDle...\n";
    $someUser = User::create([
        'name' => 'User Test',
        'email' => 'user.test@contradengue.com.br',
        'password' => password_hash('aD7fMDle', PASSWORD_BCRYPT),
        'role' => 'user',
        'status' => 1
    ]);

    $someUser->setUserEmailVerified();
    $someUser->save();
}

if ($someUser == null) {
    echo "Verificado que user ja foi criado, pulando craicao de fatos e encerrando!.\n";
    exit(1);
}

$factA = Fact::create([
    'user_id' => 2,
    'option' => 'sintomas',
    'description' => 'febre, dor de cabeça, dor atrás dos olhos, dores musculares e articulares, erupção cutânea.',
    'picture' => 'foco_dengue_1.webp',
    'latitude' => -23.5505,
    'longitude' => -46.6333,
    'address' => 'São Paulo, SP'
]);

$factB = Fact::create([
    'user_id' => 2,
    'option' => 'foco_de_dengue',
    'description' => 'Aguas paradas, recipientes com água, pneus velhos, vasos de plantas.',
    'picture' => 'foco_dengue_2.webp',
    'latitude' => -23.5505,
    'longitude' => -42.6333,
    'address' => 'São Paulo, SP'
]);

$factC = Fact::create([
    'user_id' => 2,
    'option' => 'Outros',
    'description' => 'Sempre que houver água parada, o mosquito pode se reproduzir.',
    'picture' => 'foco_dengue_3.webp',
    'latitude' => -21.5505,
    'longitude' => -46.6333,
    'address' => 'São Paulo, SP'
]);