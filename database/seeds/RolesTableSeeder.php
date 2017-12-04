<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        Defender::createRole('admin');
        Defender::createRole('coordenador');
        Defender::createRole('cerel');
        Defender::createRole('aluno');
        Defender::createRole('externo');
    }
}
