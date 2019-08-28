<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\RoleUser;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stake = auth()->user()->stake;
        $userId = auth()->user()->id;

        $roleUsers = DB::table('role_user')->select('id','role_id', 'user_id')->where('role_id','<>','2')->where('ativo', '1')->orderBy('user_id')->get();
        //dd($roleUsers);
        $roles = Role::all();
        $users = User::all();

        return view('adm.role-users.index', compact('roleUsers', 'roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stake = auth()->user()->stake;
        $userId = auth()->user()->id;
        
        if($userId == 1){
            $users = User::all();
        }else{
            $users = User::all()->where('stake', $stake);
        }

        $roles = Role::all()->where('name','<>','adm')->where('name','<>','presidente')->where('name','<>','membro');

        return view('adm.role-users.create', compact('roles','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roleUser = DB::table('role_user')->select('role_id','user_id')->get();

        $roleUser->role_id = $request->role_id;
        $roleUser->user_id = $request->user_id;
        
        $roleUser = DB::table('role_user')->insert(
            ['role_id' => $request->role_id, 'user_id' => $request->user_id]
        );

        return redirect()->route('role-users.index')->with('alertSuccess','Perfil adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('role_user')->select('id')->where('id',$id)->delete();

        return redirect()->back()->with('alertDanger', 'Excluído!');
    }
}
