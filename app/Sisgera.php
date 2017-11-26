<?php

namespace Sisgera;

class Sisgera
{
    const ADMIN = 'admin';
    const COORDENADOR = 'coordenador';
    const CEREL = 'cerel';
    const ALUNO = 'aluno';
    const CIVIL = 'civil';


    public static function scriptVariables()
    {
        return [
            'user' => self::getCurrentUser(),
            'csrfToken' => csrf_token(),

            'regras' => [

                'admin' => 'admin',
                'coordenador' => 'coordenador',
                'cerel' => 'cerel',
                'aluno' => 'aluno',
                'civil' => 'civil',

            ],

        ];


    }

    public static function getCurrentUser()
    {
        if (auth()->guest()) return null;
        return auth()->user()->toArray();
    }
}