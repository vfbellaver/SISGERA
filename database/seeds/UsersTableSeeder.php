<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $this->createAdminUsers();
        $this->createCoordernadorCoordenadores();
        $this->createUserUsers();
    }

    private function createAdminUsers()
    {
        $role = Defender::findRole('admin');
        $user = factory(\App\User::class)->create([
            'name' => 'Admin Sisgera',
            'rg' => 0000000000,
            'cpf' => 0000000000,
            'telefone' => 1122334455,
            'email' => 'admin@sisgera.com',
            'password' => bcrypt('sisgera##'),
        ]);
        $user->attachRole($role);
    }

    public function createCoordernadorCoordenadores()
    {
        $role = Defender::findRole('coordernador');
        $user = factory(\App\User::class)->create([
            'name' => 'Coordenador Curso',
            'rg' => 1111111111,
            'cpf' => 111111111,
            'telefone' => 2211334455,
            'email' => 'coord.tsi@sisgera.com',
            'password' => bcrypt('coordsisgera##'),
        ]);
         $user->attachRole($role);
    }

    public function createUserUsers()
    {
        $role = Defender::findRole('usuario');
        $user = factory(\App\User::class)->create([
            'name' => 'Aluno Fulano',
            'rg' => 44444444,
            'cpf' => 555555555,
            'telefone' => 123123123,
            'email' => 'aluno.tsi@example.com',
            'password' => bcrypt('alunosisgera##'),
        ]);
        $user->attachRole($role);

    }

}
