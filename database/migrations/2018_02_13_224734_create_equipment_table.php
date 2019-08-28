<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stake',50);
            $table->string('name');
            $table->string('marca',50)->nullable();
            $table->string('modelo',100)->nullable();
            $table->string('num_serie',200)->nullable();
            $table->string('description',300)->nullable();
            $table->integer('qtd')->nullable()->default(1);
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
        Schema::dropIfExists('equipment');
    }
}
