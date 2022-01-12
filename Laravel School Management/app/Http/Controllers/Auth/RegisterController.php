<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/enrollments';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address'=> 'required|string|min:6|max:100',
            'phone' => 'numeric|required',
            'cpf' => 'numeric|required|unique:users',
            'rg' => 'numeric|required|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        //  return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'is_admin' => false,
        //     'address' => $data['address'],
        //     'cpf' => $data['cpf'],
        //     'rg' => $data['rg'],
        //     'phone' => $data['phone'],
        //     'password' => Hash::make($data['password']),
        // ]);
        
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->is_admin = false;
        $user->password = Hash::make($data['password']);
        $user->address = $data['address'];
        $user->cpf = $data['cpf'];
        $user->rg = $data['rg'];
        $user->phone = $data['phone'];
        $user->save();

        return ($user);
    }
}
