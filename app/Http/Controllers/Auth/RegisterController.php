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
            'name' => 'required|string|max:120',
            'cpf' => 'required|unique:users',
            'dt_nasc' => 'required|date',
            'phone1' => 'required',
            'email' => 'required|string|email|max:150',
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
        //dd($data);
        $user =  User::create([
            'tipo' => $data['tipo'],
            'bloco' => $data['bloco'],
            'apto' => $data['apto'],
            'name' => strtoupper($data['name']),
            'genre' => $data['genre'],
            'cpf' => $data['cpf'],
            'dt_nasc' => $data['dt_nasc'],
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'],
            'foto' => $data['foto'],
            'residente1' => strtoupper($data['residente1']),
            'residente2' => strtoupper($data['residente2']),
            'residente3' => strtoupper($data['residente3']),
            'residente4' => strtoupper($data['residente4']),
            'residente5' => strtoupper($data['residente5']),
            'idade_residente1' => $data['idade_residente1'],
            'idade_residente2' => $data['idade_residente2'],
            'idade_residente3' => $data['idade_residente3'],
            'idade_residente4' => $data['idade_residente4'],
            'idade_residente5' => $data['idade_residente5'],
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
