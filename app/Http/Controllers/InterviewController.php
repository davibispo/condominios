<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\InterviewType;
use App\User;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stake = auth()->user()->stake;
        $user = auth()->user()->id;
        $users = User::all()->where('stake', $stake);
        
        $perfilPatriarca = DB::table('role_user')->where('user_id', $user)->where('role_id', 6)->value('role_id');
        $perfilPresidencia = DB::table('role_user')->where('user_id', $user)->where('role_id', 5)->value('role_id');
        $perfilPresidente = DB::table('role_user')->where('user_id', $user)->where('role_id', 8)->value('role_id');
        $perfilSecretario = DB::table('role_user')->where('user_id', $user)->where('role_id', 11)->value('role_id');
        //dd($perfilPresidencia);
        // mostra as solicitações de acordo com o perfil do usuário logado.
        if($perfilPresidencia == 5 || $perfilSecretario == 11){
            $interviews = Interview::all()
                            ->where('ativo','1')
                            ->where('stake', $stake)
                            ->sortByDesc('created_at');
        }elseif($perfilPatriarca == 6){
            $interviews = Interview::all()
                            ->where('ativo','1')
                            ->where('stake', $stake)
                            ->where('interviewer', 'Patriarca')
                            ->sortByDesc('created_at');
        }else{
            $interviews = Interview::all()
                            ->where('ativo','1')
                            ->where('stake', $stake)
                            ->where('user_id', $user)
                            ->sortByDesc('created_at');
        }

        return view('stakes.interviews.index', compact('stake','interviews','users'));
    }

    public function create()
    {
        $stake = auth()->user()->stake;
        $interviewTypes = InterviewType::all()->where('ativo', '1');
        return view('stakes.interviews.create', compact('stake','interviewTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'interviewer' => 'required|string|max:40',
        ]);
        
        $interview = new Interview();
        
        $interview->user_id = auth()->user()->id;
        $interview->interview_type_id = $request->interview_type_id;
        $interview->stake = auth()->user()->stake;
        $interview->interviewer = $request->interviewer;
        $interview->status = '1';
        $interview->data = $request->data;
        
        $interview->save();
        
        return redirect()->route('interviews.index')->with('alertSuccess', 'Entrevista solicitada! Acompanhe sua solicitação pelo Status');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $stake = auth()->user()->stake;
        $interview = Interview::find($id);
        $userName = User::where('id',$interview->user_id)->value('name');
        $userLastname = User::where('id',$interview->user_id)->value('lastname');
        $userPhone = User::where('id',$interview->user_id)->value('phone');
        $userWard = User::where('id',$interview->user_id)->value('ward');
        $interviewType = InterviewType::where('id', $interview->interview_type_id)->value('description');
        
        return view('stakes.interviews.update', compact('stake','interview','userName','userLastname','userPhone','interviewType','userWard'));
    }

    public function update(Request $request, $id)
    {
        $interview = Interview::find($id);

        $interview->status = $request->status;
        $interview->data = $request->data;
        $interview->update();
        
        switch($interview->status){
            case '2' :
                $return = redirect()->route('interviews.index')->with('alertSuccess', 'Entrevista Confirmada!');
            break;
            case '3' :
                $return = redirect()->route('interviews.index')->with('alertDanger', 'Entrevista Cancelada!');
            break;
            case '4' :
                $return = redirect()->route('interviews.index')->with('alertSuccess', 'Entrevista Realizada!');
            break;
            default;
        }
        
        return $return;
    }
    
    public function destroy($id)
    {
        $interview = Interview::find($id);

        $interview->ativo = '0';
        $interview->update();
        
        return redirect()->route('interviews.index')->with('alertDanger', 'Entrevista excluída!');
    }
}
