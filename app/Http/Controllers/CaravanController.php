<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caravan;

class CaravanController extends Controller
{
    public function index()
    {
        $ano = date('Y') - 1;
        //dd($ano);
        $stake = auth()->user()->stake;
        $caravans = Caravan::all()->where('stake', $stake)->where('data','>', $ano)->where('ativo','<>', 2)->sortBy('data');
        return view('stakes.caravans.index', compact('stake','caravans'));
    }

    public function create()
    {
        $stake = auth()->user()->stake;
        return view('stakes.caravans.create', compact('stake'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'data' => 'required|date',
            'bus' => 'required',
            'accommodation' => 'required',
        ]);
        
        $caravan = new Caravan();
        
        $caravan->stake = $request->stake;
        $caravan->data = $request->data;
        $caravan->leader = strtoupper($request->leader);
        $caravan->phone = $request->phone;
        $caravan->bus = $request->bus;
        $caravan->accommodation = $request->accommodation;
        $caravan->obs = $request->obs;
        $caravan->status = $request->status;
        
        $caravan->save();
        
        return redirect()->route('caravans.index')->with('alertSuccess', 'Criada com sucesso!');
    }

    public function show($id)
    {
        $caravan = Caravan::find($id);
        return view('stakes.caravans.show', compact('caravan'));
    }

    public function edit($id)
    {
        $stake = auth()->user()->stake;
        $caravan = Caravan::find($id);

        return view('stakes.caravans.update', compact('caravan','stake'));
    }

    public function update(Request $request, $id)
    {
        $caravan = Caravan::find($id);
        
        $this->validate($request, [
            'data' => 'required|date',
            'bus' => 'required',
            'accommodation' => 'required',
        ]);
        
        $caravan->data = $request->data;
        $caravan->leader = $request->leader;
        $caravan->phone = $request->phone;
        $caravan->bus = $request->bus;
        $caravan->accommodation = $request->accommodation;
        $caravan->obs = $request->obs;
        $caravan->status = $request->status;
        
        $caravan->update();
        
        return redirect()->route('caravans.index')->with('alertSuccess', 'Atualizada!');
    }

    public function destroy($id)
    {
        $caravan = Caravan::find($id);

        $caravan->ativo = '2'; //não mostra na pagina.
        $caravan->update();

        return redirect()->route('caravans.index')->with('alertDanger', 'Excluída!');
    }

    public function ativar($id)
    {
        $stake = auth()->user()->stake;
        $caravan = Caravan::find($id);

        if($caravan->ativo == 0){
            $caravan->ativo = 1; //ativar cadastro
            $caravan->update();
            return redirect()->back();
        }else{
            $caravan->ativo = 0; //desativar cadastro
            $caravan->update();
            return redirect()->back();
        }
    }
}
