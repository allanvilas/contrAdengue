<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

require_once __DIR__ . '/../bootstrap/app.php';
require_once __DIR__ . '/../vendor/autoload.php';

Capsule::schema()->create('facts_options', function (Blueprint $table) {
    $table->increments('id');

    // 🔗 Foreign key para a tabela users
    $table->unsignedInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

    $table->string('option');
    $table->text('description')->nullable();
    $table->string('picture')->nullable();
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();
    $table->string('address')->nullable();

    $table->timestamps();
    $table->softDeletes();
});
