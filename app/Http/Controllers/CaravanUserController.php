<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaravanUser;
use App\Models\Caravan;
use App\User;
use Illuminate\Support\Facades\DB;

class CaravanUserController extends Controller {

    public function index() {
        $stake = auth()->user()->stake;
        $caravans = Caravan::all()->where('stake', $stake)->where('ativo','1')->sortBy('data');
        $caravanUsers = CaravanUser::all()->where('ativo','1')->sortBy('poltrona');
        $users = User::all()->where('stake', $stake)->where('ativo', 1);

        //pega data por extenso em portugues
        setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        //dd(strftime("%A, %d de %B de %Y", strtotime($data)));
        //dd(strtoupper(strftime("%B de %Y", strtotime($data))));
        
        /*
         * status   
         * 1 = lista principal,
         * 2 = lista reserva,
         * 3 = criança ou outra pessoa com poltrona
         * 4 = criança sem poltrona
         * 5 = outra pessoa colocada na lista reserva
         */
        $statusPrincipal = 1;
        $statusReserva = 2;
        $criancaComPoltrona = 3;
        $criancaSemPoltrona = 4;
        $outraPessoaNaListaReserva = 5;

        return view('stakes.caravan-users.index', compact('stake', 'caravanUsers', 'caravans', 'users', 'count', 'statusPrincipal', 'statusReserva', 'vagas', 'criancaComPoltrona', 'criancaSemPoltrona','outraPessoaNaListaReserva'));
    }

    public function createCaravanUser($caravanId) {

        $caravan = Caravan::find($caravanId);
        $stake = auth()->user()->stake;
        $userId = auth()->user()->id;
        $caravanUsers = CaravanUser::all()->where('ativo','1')->where('caravan_id',$caravanId);

        return view('stakes.caravan-users.create-caravan-user', compact('stake', 'caravan', 'userId','caravanUsers'));
    }

    public function createCaravanUserKid($caravanId) {

        $caravan = Caravan::find($caravanId);
        $stake = auth()->user()->stake;
        $userId = auth()->user()->id;

        return view('stakes.caravan-users.create-caravan-user-kid', compact('stake', 'caravan', 'userId'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'poltrona' => 'required|integer',
        ]);

        $caravanUser = new CaravanUser();

        $caravanUser->caravan_id = $request->caravan_id;
        $caravanUser->user_id = $request->user_id;
        $caravanUser->poltrona = $request->poltrona;
        $caravanUser->kid = $request->kid;

        if ((isset($caravanUser->kid)) && $caravanUser->poltrona > 0 && $caravanUser->poltrona != 99) {
            $caravanUser->status = '3'; //crianca ou outra pessoa com poltrona
            $caravanUser->kid_doc = $request->kid_doc;
            $caravanUser->kid_age = $request->kid_age;
            $caravanUser->cadastrador = auth()->user()->name;

        } elseif ((isset($caravanUser->kid)) && $caravanUser->poltrona == 0) {
            $caravanUser->status = '4'; //criança sem poltrona
            $caravanUser->kid_doc = $request->kid_doc;
            $caravanUser->kid_age = $request->kid_age;
            $caravanUser->cadastrador = auth()->user()->name;

        } elseif ((isset($caravanUser->kid)) && $caravanUser->poltrona == 99) {
            $caravanUser->status = '5'; // Outra pessoa colocada na lista reserva
            $caravanUser->kid_doc = $request->kid_doc;
            $caravanUser->kid_age = $request->kid_age;
            $caravanUser->cadastrador = auth()->user()->name;

        } else {
            $caravanUser->status = $request->status;
        }

        $userExist = DB::table('caravan_users')
                            ->where('ativo','1')
                            ->where('caravan_id', $caravanUser->caravan_id)
                            ->where('user_id', auth()->user()->id)
                            ->value('user_id');
       
        if (!$userExist || $caravanUser->kid) {
            $caravanUser->save();
            return redirect()->route('caravan-users.index')->with('alertSuccess', 'Vaga reservada com sucesso!');
        } else {
            return redirect()->back()->with('alertDanger', 'Desculpe! Já existe um cadastrado seu nesta caravana!');
        }
    }

    public function show($id) {
        $stake = auth()->user()->stake;
        $caravan = Caravan::find($id);
        $caravanUsers = CaravanUser::all()->where('ativo','1')->sortBy('poltrona');
        $users = User::all()->where('stake', $stake);

        /*
         * status   
         * 1 = lista principal,
         * 2 = lista reserva,
         * 3 = criança com poltrona
         * 4 = criança sem poltrona
         */
        $statusPrincipal = 1;
        $statusReserva = 2;
        $criancaComPoltrona = 3;
        $criancaSemPoltrona = 4;
        $outraPessoaNaListaReserva = 5;

        // contagem de quantos membros se cadastraram na lista principal e na lista reserva
        $listaPrincipal = 0;
        $listaReserva = 0;

        foreach ($caravanUsers as $caravanUser) {
            if ($caravanUser->caravan_id == $caravan->id && $caravanUser->poltrona > 0 && $caravanUser->poltrona != 99) {
                $listaPrincipal++;
            } elseif ($caravanUser->caravan_id == $caravan->id && ($caravanUser->status == 2 || $caravanUser->status == 5)) {
                $listaReserva++;
            }
        }

        // calculo do valor da caravana por membro
        $bus = $caravan->bus; //valor do aluguel do onibus
        $accommodation = $caravan->accommodation; // valor do alojamento
        if ($listaPrincipal != 0) {
            $caravanPrice = ($bus / $listaPrincipal) + $accommodation; // valor da caravana por membro
        } else {
            $caravanPrice = 0;
        }

        //total geral principal + reserva
        $totalCadastrados = $listaPrincipal + $listaReserva;

        return view('stakes.caravan-users.show', compact('caravan', 'stake', 'caravanUsers', 'users', 'listaPrincipal', 'listaReserva', 'totalCadastrados', 'caravanPrice', 'statusPrincipal', 'statusReserva', 'criancaComPoltrona', 'criancaSemPoltrona'));
    }

    //metodo para impressao dos detalhes da caravana
    public function showPrint($id) {
        $stake = auth()->user()->stake;
        $caravan = Caravan::find($id);
        $caravanUsers = CaravanUser::all()->where('ativo','1')->sortBy('poltrona');
        $users = User::all()->where('stake', $stake);

        /*
         * status   
         * 1 = lista principal,
         * 2 = lista reserva,
         * 3 = criança com poltrona
         * 4 = criança sem poltrona
         */
        $statusPrincipal = 1;
        $statusReserva = 2;
        $criancaComPoltrona = 3;
        $criancaSemPoltrona = 4;

        // contagem de quantos membros se cadastraram na lista principal e na lista reserva
        $listaPrincipal = 0;
        $listaReserva = 0;

        foreach ($caravanUsers as $caravanUser) {
            if ($caravanUser->caravan_id == $caravan->id && $caravanUser->poltrona > 0 && $caravanUser->poltrona != 99) {
                $listaPrincipal++;
            } elseif ($caravanUser->caravan_id == $caravan->id && ($caravanUser->status == 2 || $caravanUser->status == 5)) {
                $listaReserva++;
            }
        }

        // calculo do valor da caravana por membro
        $bus = $caravan->bus; //valor do aluguel do onibus
        $accommodation = $caravan->accommodation; // valor do alojamento
        if ($listaPrincipal != 0) {
            $caravanPrice = ($bus / $listaPrincipal) + $accommodation; // valor da caravana por membro
        } else {
            $caravanPrice = 0;
        }

        //total geral principal + reserva
        $totalCadastrados = $listaPrincipal + $listaReserva;

        return view('stakes.caravan-users.show-print', compact('caravan', 'stake', 'caravanUsers', 'users', 'listaPrincipal', 'listaReserva', 'totalCadastrados', 'caravanPrice', 'statusPrincipal', 'statusReserva'));
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        $caravanUser = CaravanUser::find($id);

        $caravanUser->status = $request->status;
        $caravanUser->poltrona = $request->poltrona;

        $consulta = DB::table('caravan_users')
                    ->where('ativo','1')
                    ->where('poltrona', '!=', $caravanUser->poltrona)
                    ->get();

        if ($consulta) {
            $caravanUser->update();
            return redirect()->back()->with('alertSuccess', 'Atualizado!');
        } else {
            return redirect()->back()->with('alertDanger', 'Houve algum erro!');
        }
    }

    public function destroy($id) {
        $caravanUser = CaravanUser::find($id);

        $caravanUser->ativo = '0';
        $caravanUser->update();

        return redirect()->back()->with('alertDanger', 'Excluído!');
    }
}
