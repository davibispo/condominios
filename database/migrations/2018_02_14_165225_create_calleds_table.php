<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calleds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stake',50);
            $table->string('called',100);
            $table->string('member',100);
            $table->string('priesthood',50)->nullable();
            $table->string('ward',50);
            $table->integer('user_id');
            $table->text('obs')->nullable();
            $table->char('status',1)->nullable()->default('1'); 
            $table->text('reason_reject')->nullable(); //novo
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
        Schema::dropIfExists('calleds');
    }
}
