<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConselorMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conselor_meetings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->date('data');
            $table->string('reuniao',100);
            $table->string('presidindo', 60)->nullable();
            
            $table->string('participante1', 80)->nullable();
            $table->string('participante2', 80)->nullable();
            $table->string('participante3', 80)->nullable();
            $table->string('participante4', 80)->nullable();
            $table->string('participante5', 80)->nullable();
            $table->string('participante6', 80)->nullable();
            $table->string('participante7', 80)->nullable();
            $table->string('participante8', 80)->nullable();
            $table->string('participante9', 80)->nullable();
            $table->string('participante10', 80)->nullable();
            $table->string('participante11', 80)->nullable();
            $table->string('participante12', 80)->nullable();
            $table->string('participante13', 80)->nullable();
            $table->string('participante14', 80)->nullable();
            $table->string('participante15', 80)->nullable();
            $table->string('participante16', 80)->nullable();
            $table->string('participante17', 80)->nullable();
            $table->string('participante18', 80)->nullable();
            $table->string('participante19', 80)->nullable();
            $table->string('participante20', 80)->nullable();
            
            $table->string('chamado1', 80)->nullable();
            $table->string('chamado2', 80)->nullable();
            $table->string('chamado3', 80)->nullable();
            $table->string('chamado4', 80)->nullable();
            $table->string('chamado5', 80)->nullable();
            $table->string('chamado6', 80)->nullable();
            $table->string('chamado7', 80)->nullable();
            $table->string('chamado8', 80)->nullable();
            $table->string('chamado9', 80)->nullable();
            $table->string('chamado10', 80)->nullable();
            $table->string('chamado11', 80)->nullable();
            $table->string('chamado12', 80)->nullable();
            $table->string('chamado13', 80)->nullable();
            $table->string('chamado14', 80)->nullable();
            $table->string('chamado15', 80)->nullable();
            $table->string('chamado16', 80)->nullable();
            $table->string('chamado17', 80)->nullable();
            $table->string('chamado18', 80)->nullable();
            $table->string('chamado19', 80)->nullable();
            $table->string('chamado20', 80)->nullable();
            
            $table->string('participacao1', 200)->nullable();
            $table->string('participacao2', 200)->nullable();
            $table->string('participacao3', 200)->nullable();
            $table->string('participacao4', 200)->nullable();
            $table->string('participacao5', 200)->nullable();
            $table->string('participacao6', 200)->nullable();
            $table->string('participacao7', 200)->nullable();
            $table->string('participacao8', 200)->nullable();
            $table->string('participacao9', 200)->nullable();
            $table->string('participacao10', 200)->nullable();
            $table->string('participacao11', 200)->nullable();
            $table->string('participacao12', 200)->nullable();
            $table->string('participacao13', 200)->nullable();
            $table->string('participacao14', 200)->nullable();
            $table->string('participacao15', 200)->nullable();
            $table->string('participacao16', 200)->nullable();
            $table->string('participacao17', 200)->nullable();
            $table->string('participacao18', 200)->nullable();
            $table->string('participacao19', 200)->nullable();
            $table->string('participacao20', 200)->nullable();
            
            $table->text('ata')->nullable();
            
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
        Schema::dropIfExists('conselor_meetings');
    }
}
