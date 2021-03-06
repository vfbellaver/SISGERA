<?php

use Illuminate\Database\Seeder;
use Sisgera\Models\User;

class RequerimentoSeeder extends Seeder
{

    public function run()
    {
       $this->createRequerimentos();
       $this->attachRequerimentos();
    }

    private function createRequerimentos()
    {
        User::all()->each(function ($user) {
            factory(\Sisgera\Models\Requerimento::class, 3)->create(['user_id' => $user->id,'nome_estudante' => $user->name]);
        });
    }

    private function attachRequerimentos()
    {
        \Sisgera\Models\Requerimento::all()->each(function(\Sisgera\Models\Requerimento $requerimento){
            $tprequerimento = \Sisgera\Models\TiposSolicitacao::query()->where('id',rand(0,14))->get();
            $requerimento->TipoRequerimento()->attach($tprequerimento);
        });
    }
}
