<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable;
            $table->string('correo_electronico')->unique();
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contactos');
    }
};
