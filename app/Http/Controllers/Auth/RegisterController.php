<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/';

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
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:50',
            'genre' => 'required',
            'rg' => 'required|unique:users',
            'orgao_exp' => 'required|string|max:10',
            'dt_nasc' => 'required|date',
            'phone' => 'required',
            'uf' => 'required|string',
            'city' => 'required|string',
            'stake' => 'required|string',
            'ward' => 'required|string',
            'email' => 'required|string|email|unique:users|max:100',
            'password' => 'required|string|min:6|confirmed',
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
        $user =  User::create([
            'name' => strtoupper($data['name']),
            'lastname' => strtoupper($data['lastname']),
            'genre' => $data['genre'],
            'rg' => $data['rg'],
            'orgao_exp' => strtoupper($data['orgao_exp']),
            'dt_nasc' => $data['dt_nasc'],
            'phone' => $data['phone'],
            'uf' => $data['uf'],
            'city' => $data['city'],
            'stake' => $data['stake'],
            'ward' => $data['ward'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        //insere o perfil 4 de membro para cada novo registro
        DB::table('role_user')->insert(
            ['role_id' => 2, 'user_id' => $user->id]
        );

        //$user->roles()->attach(Role::where('name', 'membro')->first());
        
        return $user;
    }
}
