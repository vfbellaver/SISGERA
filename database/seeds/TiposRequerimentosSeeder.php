<?php

use Illuminate\Database\Seeder;
use Sisgera\Models\TipoRequerimento;

class TiposRequerimentosSeeder extends Seeder
{

    public function run()
    {
        $this->createTiposRequerimento();
    }

    public function createTiposRequerimento(){
        $array = [
            'Cancelamento de matricula',
            'Cancelamento de unidade curricular',
            'Certificado de qualificação profissional',
            'Convalidação',
            'Declaração',
            'Desistência de curso',
            'Enriquecimento curricular',
            'Exame de suficiência',
            'Histórico Escolar',
            'Matricula em Unidade Curricular',
            'Mudança de turma',
            'Mudança de turno',
            'Trancamento',
            'Transferência',
            'Segunda chamada',
            'Outros',
        ];
        foreach ($array as $rqr) {
            $requerimento = factory(TipoRequerimento::class)->create([
                'name' => $rqr,
            ]);
        }

    }
}
