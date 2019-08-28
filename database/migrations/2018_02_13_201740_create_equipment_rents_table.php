<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_rents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stake', 50);
            $table->integer('equipment_id')->unsigned();
            //$table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // data para pegar o equipamento
            $table->date('get_date');
            // data para devolver o equipamento
            $table->date('return_date');
            // motivo do emprestimo
            $table->string('reason_get',400);

            $table->char('status',1);
            
            // motivo de recusa
            $table->string('reason_refuses',400)->nullable();
            
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
        Schema::dropIfExists('equipment_rents');
    }
}
