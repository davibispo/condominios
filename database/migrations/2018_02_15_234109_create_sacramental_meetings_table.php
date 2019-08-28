<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSacramentalMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacramental_meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('stake', 50);
            $table->string('ward', 80);
            $table->integer('frequencia')->nullable();
            $table->date('date');
            $table->string('presidida', 60);
            $table->string('dirigida', 60);
            $table->string('rec_nome1', 60)->nullable();
            $table->string('rec_nome2', 60)->nullable();
            $table->string('rec_nome3', 60)->nullable();
            $table->string('rec_nome4', 60)->nullable();
            $table->string('rec_cham1', 60)->nullable();
            $table->string('rec_cham2', 60)->nullable();
            $table->string('rec_cham3', 60)->nullable();
            $table->string('rec_cham4', 60)->nullable();
            $table->string('anun_1', 160)->nullable();
            $table->string('anun_2', 160)->nullable();
            $table->string('anun_3', 160)->nullable();
            $table->string('anun_4', 160)->nullable();
            $table->string('anun_5', 160)->nullable();
            $table->string('pub_anun_1', 60)->nullable();
            $table->string('pub_anun_2', 60)->nullable();
            $table->string('pub_anun_3', 60)->nullable();
            $table->string('pub_anun_4', 60)->nullable();
            $table->string('pub_anun_5', 60)->nullable();
            $table->string('local_anun_1', 60)->nullable();
            $table->string('local_anun_2', 60)->nullable();
            $table->string('local_anun_3', 60)->nullable();
            $table->string('local_anun_4', 60)->nullable();
            $table->string('local_anun_5', 60)->nullable();
            $table->date('data_anun_1')->nullable();
            $table->date('data_anun_2')->nullable();
            $table->date('data_anun_3')->nullable();
            $table->date('data_anun_4')->nullable();
            $table->date('data_anun_5')->nullable();
            $table->string('hora_anun_1', 30)->nullable();
            $table->string('hora_anun_2', 30)->nullable();
            $table->string('hora_anun_3', 30)->nullable();
            $table->string('hora_anun_4', 30)->nullable();
            $table->string('hora_anun_5', 30)->nullable();
            $table->integer('hino1')->nullable();
            $table->integer('hino2')->nullable();
            $table->integer('hino3')->nullable();
            $table->integer('hino4')->nullable();
            $table->string('regente',60)->nullable();
            $table->string('pianista',60)->nullable();
            $table->string('oracao1',60)->nullable();
            $table->string('oracao2',60)->nullable();
            $table->string('bencao1',60)->nullable();
            $table->string('bencao2',60)->nullable();
            $table->string('bencao3',60)->nullable();
            $table->string('abencoador1',60)->nullable();
            $table->string('abencoador2',60)->nullable();
            $table->string('abencoador3',60)->nullable();
            $table->string('oficio1',60)->nullable();
            $table->string('oficio2',60)->nullable();
            $table->string('oficio3',60)->nullable();
            $table->string('converso1',60)->nullable();
            $table->string('converso2',60)->nullable();
            $table->string('converso3',60)->nullable();
            $table->string('converso4',60)->nullable();
            $table->string('converso5',60)->nullable();
            $table->string('confirmador1',60)->nullable();
            $table->string('confirmador2',60)->nullable();
            $table->string('confirmador3',60)->nullable();
            $table->string('confirmador4',60)->nullable();
            $table->string('confirmador5',60)->nullable();
            $table->string('oficio4',60)->nullable();
            $table->string('oficio5',60)->nullable();
            $table->string('oficio6',60)->nullable();
            $table->string('oficio7',60)->nullable();
            $table->string('oficio8',60)->nullable();
            $table->string('desob_nome1',60)->nullable();
            $table->string('desob_nome2',60)->nullable();
            $table->string('desob_nome3',60)->nullable();
            $table->string('desob_nome4',60)->nullable();
            $table->string('desob_nome5',60)->nullable();
            $table->string('desob_nome6',60)->nullable();
            $table->string('desob_cham1',60)->nullable();
            $table->string('desob_cham2',60)->nullable();
            $table->string('desob_cham3',60)->nullable();
            $table->string('desob_cham4',60)->nullable();
            $table->string('desob_cham5',60)->nullable();
            $table->string('desob_cham6',60)->nullable();
            $table->string('apoio_nome1',60)->nullable();
            $table->string('apoio_nome2',60)->nullable();
            $table->string('apoio_nome3',60)->nullable();
            $table->string('apoio_nome4',60)->nullable();
            $table->string('apoio_nome5',60)->nullable();
            $table->string('apoio_nome6',60)->nullable();
            $table->string('apoio_cham1',60)->nullable();
            $table->string('apoio_cham2',60)->nullable();
            $table->string('apoio_cham3',60)->nullable();
            $table->string('apoio_cham4',60)->nullable();
            $table->string('apoio_cham5',60)->nullable();
            $table->string('apoio_cham6',60)->nullable();
            $table->string('sacerdote1',60)->nullable();
            $table->string('sacerdote2',60)->nullable();
            $table->string('diacono1',60)->nullable();
            $table->string('diacono2',60)->nullable();
            $table->string('diacono3',60)->nullable();
            $table->string('diacono4',60)->nullable();
            $table->string('discursante1',60)->nullable();
            $table->string('discursante2',60)->nullable();
            $table->string('discursante3',60)->nullable();
            $table->string('tempo1',60)->nullable();
            $table->string('tempo2',60)->nullable();
            $table->string('tempo3',60)->nullable();
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
        Schema::dropIfExists('sacramental_meetings');
    }
}
