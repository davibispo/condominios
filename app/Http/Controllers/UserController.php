<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all()->where('ativo', true)->sortByDesc('id');
        
        return view('adm.users.index', compact('users','roles','roleUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('adm.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:50',
            'genre' => 'required',
            'rg' => 'required|unique:users',
            'dt_nasc' => 'required|date',
            'phone' => 'required|string|max:15',
            'uf' => 'required|string',
            'city' => 'required|string',
            'stake' => 'required|string',
            'ward' => 'required|string',
            'email' => 'required|string|email|unique:users|max:100',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->name = strtoupper($request->name);
        $user->lastname = strtoupper($request->lastname);
        $user->genre = $request->genre;
        $user->rg = $request->rg;
        $user->orgao_exp = strtoupper($request->orgao_exp);
        $user->dt_nasc = $request->dt_nasc;
        $user->phone = $request->phone;
        $user->uf = $request->uf;
        $user->city = $request->city;
        $user->stake = $request->stake;
        $user->ward = $request->ward;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        
        //insere o perfil 4 de membro para cada novo registro
        DB::table('role_user')->insert(
            ['role_id' => 2, 'user_id' => $user->id]
        );

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        //calculo da idade
        $dataNasc = $user->dt_nasc;
        $anoAtual = date('Y');
        $mesAtual = date('m');
        $anoNasc = date('Y', strtotime($dataNasc));
        $mesNasc = date('m', strtotime($dataNasc));

        $idade = $anoAtual - $anoNasc;

        if ($mesNasc >= $mesAtual) {
            $idade --;
        } else {
            $idade ++;
        }
        //dd($idade);

        return view('adm.users.show', compact('user', 'idade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('adm.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        ///dd($request);

        $this->validate($request, [
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:50',
            'genre' => 'required',
            'rg' => 'required',
            'orgao_exp' => 'required|string|max:10',
            'dt_nasc' => 'required|date',
            'phone' => 'required|string|max:15',
            'uf' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|string|email|max:100',
        ]);

        $user->name = strtoupper($request->name);
        $user->lastname = strtoupper($request->lastname);
        $user->genre = $request->genre;
        $user->rg = $request->rg;
        $user->orgao_exp = strtoupper($request->orgao_exp);
        $user->dt_nasc = $request->dt_nasc;
        $user->phone = $request->phone;
        $user->uf = $request->uf;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->stake = $request->stake;
        $user->ward = $request->ward;
        

        $user->update();

        return redirect()->route('stakes.index')->with('alertSuccess','Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

}
