<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SacramentalMeeting;
use App\User;
use App\Models\Hino;
use Illuminate\Support\Facades\DB;


class SacramentalMeetingController extends Controller
{

    public function index()
    {
        $stake  = auth()->user()->stake;
        $ward   = auth()->user()->ward;
        $user   = auth()->user()->id;

        $perfilPresidencia = DB::table('role_user')->where('user_id', $user)->where('role_id', 5)->value('role_id');
        $perfilSecretarios = DB::table('role_user')->where('user_id', $user)->where('role_id', 11)->value('role_id');
        $perfilSumoConselho = DB::table('role_user')->where('user_id', $user)->where('role_id', 15)->value('role_id');

        // mostra as agendas de acordo com o perfil do usuário logado.
        if($perfilPresidencia == 5 || $perfilSecretarios == 11 || $perfilSumoConselho == 15){
            $sacramentalMeetings = SacramentalMeeting::all()
                                        ->where('stake', $stake)
                                        ->where('ativo','1')
                                        ->sortBy('ward')
                                        ->sortByDesc('created_at');
        }else{
            $sacramentalMeetings = SacramentalMeeting::all()
                                        ->where('ward', $ward)
                                        ->where('stake', $stake)
                                        ->where('ativo','1')
                                        ->sortBy('ward')
                                        ->sortByDesc('created_at');
        }
        
        return view('stakes.sacramental-meetings.index', compact('stake','ward','sacramentalMeetings','chart'));
    }

    public function create()
    {
        $stake  = auth()->user()->stake;
        $ward   = auth()->user()->ward;
        $hinos  = DB::table('hinos')->get();
        return view('stakes.sacramental-meetings.create', compact('stake','ward','hinos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $sacramentalMeeting = new SacramentalMeeting();    

        $sacramentalMeeting->user_id = auth()->user()->id;
        $sacramentalMeeting->stake = auth()->user()->stake;
        $sacramentalMeeting->ward = auth()->user()->ward;

        $sacramentalMeeting->frequencia = $request->frequencia;
        $sacramentalMeeting->date = $request->date;
        $sacramentalMeeting->presidida = $request->presidida;
        $sacramentalMeeting->dirigida = $request->dirigida;

        $sacramentalMeeting->rec_nome1 = $request->rec_nome1;
        $sacramentalMeeting->rec_nome2 = $request->rec_nome2;
        $sacramentalMeeting->rec_nome3 = $request->rec_nome3;
        $sacramentalMeeting->rec_nome4 = $request->rec_nome4;

        $sacramentalMeeting->rec_cham1 = $request->rec_cham1;
        $sacramentalMeeting->rec_cham2 = $request->rec_cham2;
        $sacramentalMeeting->rec_cham3 = $request->rec_cham3;
        $sacramentalMeeting->rec_cham4 = $request->rec_cham4;

        $sacramentalMeeting->anun_1 = $request->anun_1;
        $sacramentalMeeting->anun_2 = $request->anun_2;
        $sacramentalMeeting->anun_3 = $request->anun_3;
        $sacramentalMeeting->anun_4 = $request->anun_4;
        $sacramentalMeeting->anun_5 = $request->anun_5;

        $sacramentalMeeting->pub_anun_1 = $request->pub_anun_1;
        $sacramentalMeeting->pub_anun_2 = $request->pub_anun_2;
        $sacramentalMeeting->pub_anun_3 = $request->pub_anun_3;
        $sacramentalMeeting->pub_anun_4 = $request->pub_anun_4;
        $sacramentalMeeting->pub_anun_5 = $request->pub_anun_5;

        $sacramentalMeeting->local_anun_1 = $request->local_anun_1;
        $sacramentalMeeting->local_anun_2 = $request->local_anun_2;
        $sacramentalMeeting->local_anun_3 = $request->local_anun_3;
        $sacramentalMeeting->local_anun_4 = $request->local_anun_4;
        $sacramentalMeeting->local_anun_5 = $request->local_anun_5;

        $sacramentalMeeting->data_anun_1 = $request->data_anun_1;
        $sacramentalMeeting->data_anun_2 = $request->data_anun_2;
        $sacramentalMeeting->data_anun_3 = $request->data_anun_3;
        $sacramentalMeeting->data_anun_4 = $request->data_anun_4;
        $sacramentalMeeting->data_anun_5 = $request->data_anun_5;

        $sacramentalMeeting->hora_anun_1 = $request->hora_anun_1;
        $sacramentalMeeting->hora_anun_2 = $request->hora_anun_2;
        $sacramentalMeeting->hora_anun_3 = $request->hora_anun_3;
        $sacramentalMeeting->hora_anun_4 = $request->hora_anun_4;
        $sacramentalMeeting->hora_anun_5 = $request->hora_anun_5;

        $sacramentalMeeting->hino1 = $request->hino1;
        $sacramentalMeeting->hino2 = $request->hino2;
        $sacramentalMeeting->hino3 = $request->hino3;
        $sacramentalMeeting->hino4 = $request->hino4;

        $sacramentalMeeting->regente = $request->regente;
        $sacramentalMeeting->pianista = $request->pianista;
        $sacramentalMeeting->oracao1 = $request->oracao1;
        $sacramentalMeeting->oracao2 = $request->oracao2;

        $sacramentalMeeting->bencao1 = $request->bencao1;
        $sacramentalMeeting->bencao2 = $request->bencao2;
        $sacramentalMeeting->bencao3 = $request->bencao3;

        $sacramentalMeeting->abencoador1 = $request->abencoador1;
        $sacramentalMeeting->abencoador2 = $request->abencoador2;
        $sacramentalMeeting->abencoador3 = $request->abencoador3;

        $sacramentalMeeting->oficio1 = $request->oficio1;
        $sacramentalMeeting->oficio2 = $request->oficio2;
        $sacramentalMeeting->oficio3 = $request->oficio3;

        $sacramentalMeeting->converso1 = $request->converso1;
        $sacramentalMeeting->converso2 = $request->converso2;
        $sacramentalMeeting->converso3 = $request->converso3;
        $sacramentalMeeting->converso4 = $request->converso4;
        $sacramentalMeeting->converso5 = $request->converso5;

        $sacramentalMeeting->confirmador1 = $request->confirmador1;
        $sacramentalMeeting->confirmador2 = $request->confirmador2;
        $sacramentalMeeting->confirmador3 = $request->confirmador3;
        $sacramentalMeeting->confirmador4 = $request->confirmador4;
        $sacramentalMeeting->confirmador5 = $request->confirmador5;

        $sacramentalMeeting->oficio4 = $request->oficio4;
        $sacramentalMeeting->oficio5 = $request->oficio5;
        $sacramentalMeeting->oficio6 = $request->oficio6;
        $sacramentalMeeting->oficio7 = $request->oficio7;
        $sacramentalMeeting->oficio8 = $request->oficio8;

        $sacramentalMeeting->desob_nome1 = $request->desob_nome1;
        $sacramentalMeeting->desob_nome2 = $request->desob_nome2;
        $sacramentalMeeting->desob_nome3 = $request->desob_nome3;
        $sacramentalMeeting->desob_nome4 = $request->desob_nome4;
        $sacramentalMeeting->desob_nome5 = $request->desob_nome5;
        $sacramentalMeeting->desob_nome6 = $request->desob_nome6;

        $sacramentalMeeting->desob_cham1 = $request->desob_cham1;
        $sacramentalMeeting->desob_cham2 = $request->desob_cham2;
        $sacramentalMeeting->desob_cham3 = $request->desob_cham3;
        $sacramentalMeeting->desob_cham4 = $request->desob_cham4;
        $sacramentalMeeting->desob_cham5 = $request->desob_cham5;
        $sacramentalMeeting->desob_cham6 = $request->desob_cham6;

        $sacramentalMeeting->apoio_nome1 = $request->apoio_nome1;
        $sacramentalMeeting->apoio_nome2 = $request->apoio_nome2;
        $sacramentalMeeting->apoio_nome3 = $request->apoio_nome3;
        $sacramentalMeeting->apoio_nome4 = $request->apoio_nome4;
        $sacramentalMeeting->apoio_nome5 = $request->apoio_nome5;
        $sacramentalMeeting->apoio_nome6 = $request->apoio_nome6;

        $sacramentalMeeting->apoio_cham1 = $request->apoio_cham1;
        $sacramentalMeeting->apoio_cham2 = $request->apoio_cham2;
        $sacramentalMeeting->apoio_cham3 = $request->apoio_cham3;
        $sacramentalMeeting->apoio_cham4 = $request->apoio_cham4;
        $sacramentalMeeting->apoio_cham5 = $request->apoio_cham5;
        $sacramentalMeeting->apoio_cham6 = $request->apoio_cham6;

        $sacramentalMeeting->sacerdote1 = $request->sacerdote1;
        $sacramentalMeeting->sacerdote2 = $request->sacerdote2;
        $sacramentalMeeting->diacono1 = $request->diacono1;
        $sacramentalMeeting->diacono2 = $request->diacono2;
        $sacramentalMeeting->diacono3 = $request->diacono3;
        $sacramentalMeeting->diacono4 = $request->diacono4;

        $sacramentalMeeting->discursante1 = $request->discursante1;
        $sacramentalMeeting->discursante2 = $request->discursante2;
        $sacramentalMeeting->discursante3 = $request->discursante3;

        $sacramentalMeeting->tempo1 = $request->tempo1;
        $sacramentalMeeting->tempo2 = $request->tempo2;
        $sacramentalMeeting->tempo3 = $request->tempo3;

        $sacramentalMeeting->save();

        return redirect()->route('sacramental-meetings.index')->with('alertSuccess', 'Agenda criada com sucesso!');
    }

    public function show($id)
    {
        $stake = auth()->user()->stake;
        $ward = auth()->user()->ward;
        $user_id = auth()->user()->id;
        $hinos  = DB::table('hinos')->get();
        $sacramentalMeeting = SacramentalMeeting::find($id);
        
        //pega data por extenso em portugues
        setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        //dd(strftime("%A, %d de %B de %Y", strtotime($data)));
        //dd(strtoupper(strftime("%B de %Y", strtotime($data))));

        return view('stakes.sacramental-meetings.show', compact('sacramentalMeeting','stake','ward','user_id','hinos'));
    }

    public function edit($id)
    {
        $stake = auth()->user()->stake;
        $ward = auth()->user()->ward;
        $user_id = auth()->user()->id;
        $hinos  = DB::table('hinos')->get();

        $sacramentalMeeting = SacramentalMeeting::find($id);
        return view('stakes.sacramental-meetings.update', compact('sacramentalMeeting','stake','ward','user_id','hinos'));
    }

    public function update(Request $request, $id)
    {

        $sacramentalMeeting = SacramentalMeeting::find($id);

        $sacramentalMeeting->user_id = auth()->user()->id;
        $sacramentalMeeting->stake = auth()->user()->stake;
        $sacramentalMeeting->ward = auth()->user()->ward;

        $sacramentalMeeting->frequencia = $request->frequencia;
        $sacramentalMeeting->date = $request->date;
        $sacramentalMeeting->presidida = $request->presidida;
        $sacramentalMeeting->dirigida = $request->dirigida;

        $sacramentalMeeting->rec_nome1 = $request->rec_nome1;
        $sacramentalMeeting->rec_nome2 = $request->rec_nome2;
        $sacramentalMeeting->rec_nome3 = $request->rec_nome3;
        $sacramentalMeeting->rec_nome4 = $request->rec_nome4;

        $sacramentalMeeting->rec_cham1 = $request->rec_cham1;
        $sacramentalMeeting->rec_cham2 = $request->rec_cham2;
        $sacramentalMeeting->rec_cham3 = $request->rec_cham3;
        $sacramentalMeeting->rec_cham4 = $request->rec_cham4;

        $sacramentalMeeting->anun_1 = $request->anun_1;
        $sacramentalMeeting->anun_2 = $request->anun_2;
        $sacramentalMeeting->anun_3 = $request->anun_3;
        $sacramentalMeeting->anun_4 = $request->anun_4;
        $sacramentalMeeting->anun_5 = $request->anun_5;

        $sacramentalMeeting->pub_anun_1 = $request->pub_anun_1;
        $sacramentalMeeting->pub_anun_2 = $request->pub_anun_2;
        $sacramentalMeeting->pub_anun_3 = $request->pub_anun_3;
        $sacramentalMeeting->pub_anun_4 = $request->pub_anun_4;
        $sacramentalMeeting->pub_anun_5 = $request->pub_anun_5;

        $sacramentalMeeting->local_anun_1 = $request->local_anun_1;
        $sacramentalMeeting->local_anun_2 = $request->local_anun_2;
        $sacramentalMeeting->local_anun_3 = $request->local_anun_3;
        $sacramentalMeeting->local_anun_4 = $request->local_anun_4;
        $sacramentalMeeting->local_anun_5 = $request->local_anun_5;

        $sacramentalMeeting->data_anun_1 = $request->data_anun_1;
        $sacramentalMeeting->data_anun_2 = $request->data_anun_2;
        $sacramentalMeeting->data_anun_3 = $request->data_anun_3;
        $sacramentalMeeting->data_anun_4 = $request->data_anun_4;
        $sacramentalMeeting->data_anun_5 = $request->data_anun_5;

        $sacramentalMeeting->hora_anun_1 = $request->hora_anun_1;
        $sacramentalMeeting->hora_anun_2 = $request->hora_anun_2;
        $sacramentalMeeting->hora_anun_3 = $request->hora_anun_3;
        $sacramentalMeeting->hora_anun_4 = $request->hora_anun_4;
        $sacramentalMeeting->hora_anun_5 = $request->hora_anun_5;

        $sacramentalMeeting->hino1 = $request->hino1;
        $sacramentalMeeting->hino2 = $request->hino2;
        $sacramentalMeeting->hino3 = $request->hino3;
        $sacramentalMeeting->hino4 = $request->hino4;

        $sacramentalMeeting->regente = $request->regente;
        $sacramentalMeeting->pianista = $request->pianista;
        $sacramentalMeeting->oracao1 = $request->oracao1;
        $sacramentalMeeting->oracao2 = $request->oracao2;

        $sacramentalMeeting->bencao1 = $request->bencao1;
        $sacramentalMeeting->bencao2 = $request->bencao2;
        $sacramentalMeeting->bencao3 = $request->bencao3;

        $sacramentalMeeting->abencoador1 = $request->abencoador1;
        $sacramentalMeeting->abencoador2 = $request->abencoador2;
        $sacramentalMeeting->abencoador3 = $request->abencoador3;

        $sacramentalMeeting->oficio1 = $request->oficio1;
        $sacramentalMeeting->oficio2 = $request->oficio2;
        $sacramentalMeeting->oficio3 = $request->oficio3;

        $sacramentalMeeting->converso1 = $request->converso1;
        $sacramentalMeeting->converso2 = $request->converso2;
        $sacramentalMeeting->converso3 = $request->converso3;
        $sacramentalMeeting->converso4 = $request->converso4;
        $sacramentalMeeting->converso5 = $request->converso5;

        $sacramentalMeeting->confirmador1 = $request->confirmador1;
        $sacramentalMeeting->confirmador2 = $request->confirmador2;
        $sacramentalMeeting->confirmador3 = $request->confirmador3;
        $sacramentalMeeting->confirmador4 = $request->confirmador4;
        $sacramentalMeeting->confirmador5 = $request->confirmador5;

        $sacramentalMeeting->oficio4 = $request->oficio4;
        $sacramentalMeeting->oficio5 = $request->oficio5;
        $sacramentalMeeting->oficio6 = $request->oficio6;
        $sacramentalMeeting->oficio7 = $request->oficio7;
        $sacramentalMeeting->oficio8 = $request->oficio8;

        $sacramentalMeeting->desob_nome1 = $request->desob_nome1;
        $sacramentalMeeting->desob_nome2 = $request->desob_nome2;
        $sacramentalMeeting->desob_nome3 = $request->desob_nome3;
        $sacramentalMeeting->desob_nome4 = $request->desob_nome4;
        $sacramentalMeeting->desob_nome5 = $request->desob_nome5;
        $sacramentalMeeting->desob_nome6 = $request->desob_nome6;

        $sacramentalMeeting->desob_cham1 = $request->desob_cham1;
        $sacramentalMeeting->desob_cham2 = $request->desob_cham2;
        $sacramentalMeeting->desob_cham3 = $request->desob_cham3;
        $sacramentalMeeting->desob_cham4 = $request->desob_cham4;
        $sacramentalMeeting->desob_cham5 = $request->desob_cham5;
        $sacramentalMeeting->desob_cham6 = $request->desob_cham6;

        $sacramentalMeeting->apoio_nome1 = $request->apoio_nome1;
        $sacramentalMeeting->apoio_nome2 = $request->apoio_nome2;
        $sacramentalMeeting->apoio_nome3 = $request->apoio_nome3;
        $sacramentalMeeting->apoio_nome4 = $request->apoio_nome4;
        $sacramentalMeeting->apoio_nome5 = $request->apoio_nome5;
        $sacramentalMeeting->apoio_nome6 = $request->apoio_nome6;

        $sacramentalMeeting->apoio_cham1 = $request->apoio_cham1;
        $sacramentalMeeting->apoio_cham2 = $request->apoio_cham2;
        $sacramentalMeeting->apoio_cham3 = $request->apoio_cham3;
        $sacramentalMeeting->apoio_cham4 = $request->apoio_cham4;
        $sacramentalMeeting->apoio_cham5 = $request->apoio_cham5;
        $sacramentalMeeting->apoio_cham6 = $request->apoio_cham6;

        $sacramentalMeeting->sacerdote1 = $request->sacerdote1;
        $sacramentalMeeting->sacerdote2 = $request->sacerdote2;
        $sacramentalMeeting->diacono1 = $request->diacono1;
        $sacramentalMeeting->diacono2 = $request->diacono2;
        $sacramentalMeeting->diacono3 = $request->diacono3;
        $sacramentalMeeting->diacono4 = $request->diacono4;

        $sacramentalMeeting->discursante1 = $request->discursante1;
        $sacramentalMeeting->discursante2 = $request->discursante2;
        $sacramentalMeeting->discursante3 = $request->discursante3;

        $sacramentalMeeting->tempo1 = $request->tempo1;
        $sacramentalMeeting->tempo2 = $request->tempo2;
        $sacramentalMeeting->tempo3 = $request->tempo3;

        $sacramentalMeeting->update();

        return redirect()->route('sacramental-meetings.index')->with('alertSuccess', 'Atualizada!');
    }

    public function destroy($id)
    {
        $sacramentalMeeting = SacramentalMeeting::find($id);

        $sacramentalMeeting->ativo = '0';
        $sacramentalMeeting->update();

        return redirect()->back()->with('alert1', 'Agenda excluída!')->with('alertDanger', 'Excluída!');
    }
}
