<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelfReliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_reliances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stake',50);
            $table->string('ward',80);
            $table->integer('user_id');
            $table->string('grupo');
            $table->char('status',1)->nullable()->default('1');
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
        Schema::dropIfExists('self_reliances');
    }
}
