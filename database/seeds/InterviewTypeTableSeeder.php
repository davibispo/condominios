<?php

use Illuminate\Database\Seeder;
use App\Models\InterviewType;

class InterviewTypeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $tipo = new InterviewType();
        $tipo->description = 'Recomendação para o Templo';
        $tipo->ativo = '1';
        $tipo->save();

    }

}
