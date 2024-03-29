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
            $table->char('ativo', 1)->default(0);
            $table->char('status', 1)->default(0);
            $table->string('tipo', 30)->nullable();
            $table->string('bloco', 5)->nullable();
            $table->string('apto', 5)->nullable();
            $table->string('name');
            $table->string('cpf', 11)->unique();
            $table->char('genre', 1);
            $table->date('dt_nasc');
            $table->string('phone1', 15);
            $table->string('phone2', 15)->nullable();
            $table->text('foto')->nullable();

            $table->string('residente1', 80)->nullable();
            $table->integer('idade_residente1')->nullable();
            
            $table->string('residente2', 80)->nullable();
            $table->integer('idade_residente2')->nullable();
            
            $table->string('residente3', 80)->nullable();
            $table->integer('idade_residente3')->nullable();
            
            $table->string('residente4', 80)->nullable();
            $table->integer('idade_residente4')->nullable();
            
            $table->string('residente5', 80)->nullable();
            $table->integer('idade_residente5')->nullable();

            $table->string('email', 80);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
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
