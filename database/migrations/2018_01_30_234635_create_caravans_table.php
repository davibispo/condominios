<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaravansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stake', 30);
            $table->date('data');
            $table->string('leader', 30)->nullable();
            $table->string('phone', 15)->nullable();
            $table->double('bus', 6, 2)->nullable()->default(0); //valor do onibus
            $table->double('accommodation', 6, 2)->nullable()->default(0); //valor do alojamento
            $table->text('obs')->nullable();
            $table->char('ativo',1)->nullable()->default('1');
            
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
        Schema::dropIfExists('caravans');
    }
}
