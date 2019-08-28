<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('lastname', 50);
            $table->char('genre', 1);
            $table->string('rg', 50)->unique();
            $table->string('orgao_exp', 10)->nullable();//orgao e uf
            $table->date('dt_nasc');
            $table->string('phone', 15);
            $table->char('uf', 2);
            $table->string('city', 60);
            $table->string('stake', 40);
            $table->string('ward', 40);
            $table->string('email', 80)->unique();
            $table->string('password');
            $table->boolean('ativo')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
