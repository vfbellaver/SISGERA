<?php

namespace Sisgera\Http\Controllers\Auth;


use Artesaos\Defender\Facades\Defender;
use Sisgera\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Sisgera\Http\Requests\RegisterInvitationRequest;
use Sisgera\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new usuarios as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'rg' => 'required|unique:users',
            'org_emissor' => 'required',
            'cpf' => 'required|unique:users',
        ],[
           'name.required' => 'Informe o nome do usuario.',
            'email.required' => 'Informe um endereco de email.',
            'email.email' => 'Informe um endereco de email válido.',
            'email.unique' => 'Já existe este endereco de email.',
            'rg.required' => 'Informe um número de Registro Geral.',
            'rg.unique' => 'Já existe este número de Registro Geral.',
            'org_emissor.required' => 'Informe um orgão emissor para o RG.',
            'cpf.required' => 'Informe o número de CPF.',
            'cpf.unique' => 'Número de CPF existente.',
            'password.required' => 'Informe a nova senha.',
            'password.min' => 'A nova senha deve conter no minimo 6 caractéres.',
            'confirm_password.required' => 'É necessária a confirmação da nova senha.',
            'confirm_password.same' => 'Confirmação de senha não confere.',
        ]);

    }


    protected function create(array $data)
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'rg' => $data['rg'],
            'org_emissor' => $data['org_emissor'],
            'cpf' => $data['cpf'],
            'password' => bcrypt($data['password']),
        ]);
        $user->save();
        $role = Defender::findRole('aluno');
        $user->attachRole($role);

        return $user;
    }

    public function invitation($token)
    {
        $isValid = false;
        $user = User::query()->where('cadastro_token', $token)->first();
        if ($user) {
            $isValid = true;
        }
        return view('auth.invitation', compact('isValid', 'token','user'));
    }

    public function registerInvitation(RegisterInvitationRequest $request)
    {

        $user = User::query()->where('cadastro_token', $request->input('cadastro_token'))->first();

        $user->cadastro_token = null;
        $user->password = bcrypt($request->input('password'));
        $user->remember_token = str_random(10);
        $user->update();

        return redirect()->route('login');

    }
}
