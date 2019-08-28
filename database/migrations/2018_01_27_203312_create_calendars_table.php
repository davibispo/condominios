<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stake', 30);
            $table->string('organizacao', 50);
            $table->string('evento', 300);
            $table->date('data');
            $table->string('horario', 30)->nullable();
            $table->string('local', 100)->nullable();
            $table->string('publico', 100)->nullable();
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
        Schema::dropIfExists('calendars');
    }
}
