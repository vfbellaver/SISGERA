<?php

use Illuminate\Database\Seeder;
use Sisgera\User;

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
            'cpf' => 0101010101,
            'telefone' => 1122334455,
            'celular' => 1122334455,
            'email' => 'usuario@sisgera.com',
            'password' => bcrypt('sisgera##'),
        ]);
        $user->attachRole($role);
    }

    public function createCoordernadorCoordenadores()
    {
        $role = Defender::findRole('coordernador');
        $user = factory(User::class)->create([
            'name' => 'Coordenador Curso',
            'rg' => 1111111111,
            'cpf' => 111111111,
            'telefone' => 2211334455,
            'celular' => 2211334455,
            'email' => 'coord.tsi@sisgera.com',
            'password' => bcrypt('coordsisgera##'),
        ]);
         $user->attachRole($role);
        factory(User::class, 7)
            ->create()
            ->each(function (User $user) use ($role) {
                $user->attachRole($role);
            });
    }

    public function createUserCerel()
    {
        $role = Defender::findRole('cerel');
        $user = factory(User::class)->create([
            'name' => 'Cerel Sisgera',
            'rg' => 534543534,
            'cpf' => 5345345345,
            'telefone' => 3453534534,
            'celular' => 3453534534,
            'email' => 'cerel@example.com',
            'password' => bcrypt('cerelsisgera##'),
        ]);
        $user->attachRole($role);

        factory(User::class, 5)
            ->create()
            ->each(function (User $user) use ($role) {
                $user->attachRole($role);
            });
    }

    public function createUserAlunos()
    {
        $role = Defender::findRole('aluno');
        $user = factory(User::class)->create([
            'name' => 'Aluno Fulano',
            'rg' => 44444444,
            'cpf' => 555555555,
            'telefone' => 123123123,
            'celular' => 123123123,
            'email' => 'aluno.tsi@example.com',
            'password' => bcrypt('alunosisgera##'),
        ]);
        $user->attachRole($role);

        factory(User::class, 200)
            ->create()
            ->each(function (User $user) use ($role) {
                $user->attachRole($role);
            });
    }

    public function createUserCivil()
    {
        $role = Defender::findRole('civil');
        $user = factory(User::class)->create([
            'name' => 'Civil Sisgera',
            'rg' => 534543543,
            'cpf' => 34534543,
            'telefone' => 3453534534,
            'celular' => 3453534534,
            'email' => 'civil@example.com',
            'password' => bcrypt('cerelsisgera##'),
        ]);
        $user->attachRole($role);

        factory(User::class, 20)
            ->create()
            ->each(function (User $user) use ($role) {
                $user->attachRole($role);
            });
    }
}
