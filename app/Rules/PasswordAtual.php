<?php

namespace Sisgera\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;

class PasswordAtual implements Rule
{

    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        $user = auth()->user();
        return Hash::check($value, $user->password);
    }


    public function message()
    {
        return 'A senha atual não confere.';
    }
}
