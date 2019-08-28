<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConselorCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conselor_calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('org');
            $table->string('evento');
            $table->date('date');
            $table->string('horario')->nullable();
            $table->string('local')->nullable();
            $table->string('obs')->nullable();
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
        Schema::dropIfExists('conselor_calendars');
    }
}
