<?php

namespace Sisgera\Http\Controllers\Auth;


use Artesaos\Defender\Facades\Defender;
use Sisgera\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Sisgera\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
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
        $user = User::query()->where('invitation_token', $token)->first();
        if ($user) {
            $isValid = true;
        }
        return view('auth.invitation', compact('isValid', 'token'));
    }

    public function registerInvitation(Request $request)
    {

        $user = User::where('invitation_token', $request->input('invitation_token'))->first();

        $user->name = $request->input('name');
        $user->invitation_token = null;
        $user->password = bcrypt($request->input('password'));
        $user->remember_token = str_random(10);
        $user->save();
        $role = Defender::findRole();
        $user->attachRole($role);

        return redirect()->route('home');

    }
}
