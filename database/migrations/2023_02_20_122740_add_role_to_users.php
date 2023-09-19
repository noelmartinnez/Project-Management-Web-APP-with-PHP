<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // TODO tener cuidado durante el proyecto, al borrar un role
            // los usuarios que lo tenian $user->role
            // devuelve falso pero $user->role_id devuelve el numero
            // antiguo.
            $table->foreignId('role_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('issues');
            Schema::dropIfExists('users');
        });
    }
};
