<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        Defender::createRole('admin');
        Defender::createRole('coordernador');
        Defender::createRole('cerel');
        Defender::createRole('usuario');
    }
}
