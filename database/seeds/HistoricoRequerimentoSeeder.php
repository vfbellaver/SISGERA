<?php

use Illuminate\Database\Seeder;

class HistoricoRequerimentoSeeder extends Seeder
{

    public function run()
    {
       $this->criarHistorico();
    }

    private function criarHistorico()
    {
        \Sisgera\Models\Requerimento::all()->each(function ($requerimento) {
            factory(\Sisgera\Models\HistoricoRequerimento::class, 2)
                ->create(['usuario_id' => $requerimento->usuario,'requerimento_id'=>$requerimento->id]);
        });
    }
}
