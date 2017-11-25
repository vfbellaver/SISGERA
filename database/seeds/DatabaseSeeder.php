<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TiposSolicitacaoSeeder::class);
        $this->call(RequerimentoSeeder::class);
        $this->call(HistoricoRequerimentoSeeder::class);
    }
}
