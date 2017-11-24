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
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
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

        $user = User::where('cadastro_token', $request->input('cadastro_token'))->first();

        $user->cadastro_token = null;
        $user->password = bcrypt($request->input('password'));
        $user->remember_token = str_random(10);
        $user->save();

        return redirect()->route('login');

    }
}
