<?php

use Illuminate\Database\Seeder;
use Sisgera\Models\Conta;

class ContasSeeder extends Seeder
{

    public function run()
    {
        $this->createContas();
    }

    private function createContas()
    {
        $array = [
            'Coordenador COTSI',
            'Coordenador COTAL',
            'Coordenador Quimica',
            'Coordenador Eng. Pesca',
            'Cerel',

        ];

        foreach ($array as $conta) {
            $contas = Conta::query()->create([
                'nome' => $conta,
                'funcao' => $conta,

            ]);
        }
    }
}
