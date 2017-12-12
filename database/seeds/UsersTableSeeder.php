<?php

use Illuminate\Database\Seeder;
use Sisgera\Models\User;


class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $this->createAdminUsers();
        $this->createCoordernadorCoordenadores();
        $this->createUserCerel();
        $this->createUserAlunos();
        $this->createUserCivil();
    }

    private function createAdminUsers()
    {
        $role = Defender::findRole('admin');
        $user = factory(User::class)->create([
            'name' => 'Admin Sisgera',
            'rg' => 0101010101,
            'org_emissor' => 'SSP-IFMS',
            'cpf' => 0101010101,
            'telefone' => 1122334455,
            'celular' => 1122334455,
            'email' => 'admin@sisgera.com',
            'password' => bcrypt('sisgeradev##'),
        ]);
        $user->attachRole($role);
    }

    public function createCoordernadorCoordenadores()
    {
        $role = Defender::findRole('coordenador');
        $user = factory(User::class)->create([
            'name' => 'Fulano da Silva ',
            'rg' => 1111111111,
            'org_emissor' => 'SSP-IFMS',
            'cpf' => 111111111,
            'telefone' => 2211334455,
            'celular' => 2211334455,
            'email' => 'coord.tsi@sisgera.com',
            'password' => bcrypt('coordsisgera##'),
            'conta_id' => 1,
        ]);
         $user->attachRole($role);
    }

    public function createUserCerel()
    {
        $role = Defender::findRole('cerel');
        $user = factory(User::class)->create([
            'name' => 'Fulano Ciclano',
            'rg' => 534543534,
            'org_emissor' => 'SSP-IFMS',
            'cpf' => 5345345345,
            'telefone' => 3453534534,
            'celular' => 3453534534,
            'email' => 'cerel@sisgera.com',
            'password' => bcrypt('cerelsisgera##'),
            'conta_id' => 5,
        ]);
        $user->attachRole($role);

    }

    public function createUserAlunos()
    {
        $role = Defender::findRole('aluno');
        $user = factory(User::class)->create([
            'name' => 'Fulano Sofredor',
            'rg' => 44444444,
            'org_emissor' => 'SSP-IFMS',
            'cpf' => 555555555,
            'telefone' => 123123123,
            'celular' => 123123123,
            'email' => 'aluno@sisgera.com',
            'password' => bcrypt('alunosisgera##'),
        ]);
        $user->attachRole($role);

    }

    public function createUserCivil()
    {
        $role = Defender::findRole('externo');
        $user = factory(User::class)->create([
            'name' => 'Fulano Externo',
            'rg' => 534543543,
            'org_emissor' => 'SSP-IFMS',
            'cpf' => 34534543,
            'telefone' => 3453534534,
            'celular' => 3453534534,
            'email' => 'civil@@sisgera.com',
            'password' => bcrypt('civilsisgera##'),
        ]);
        $user->attachRole($role);

    }
}
