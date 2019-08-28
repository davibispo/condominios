<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller {

    public function index() {
        $stake = auth()->user()->stake;
        $equipments = Equipment::all()->where('stake', $stake)->where('ativo','1');
        return view('stakes.equipments.index', compact('stake', 'equipments'));
    }

    public function create() {
        $stake = auth()->user()->stake;
        return view('stakes.equipments.create', compact('stake'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        $equipment = new Equipment();

        $equipment->stake = $request->stake;
        $equipment->name = $request->name;
        $equipment->marca = $request->marca;
        $equipment->modelo = $request->modelo;
        $equipment->num_serie = $request->num_serie;
        $equipment->description = $request->description;
        $equipment->qtd = $request->qtd;

        $equipment->save();

        return redirect()->route('equipments.index')->with('alertSuccess', 'Cadastrado com sucesso!');
    }

    public function edit($id) {
        $stake = auth()->user()->stake;
        $equipment = Equipment::find($id);
        return view('stakes.equipments.update', compact('equipment', 'stake'));
    }

    public function update(Request $request, $id) {
        $equipment = Equipment::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        $equipment->stake = $request->stake;
        $equipment->name = $request->name;
        $equipment->marca = $request->marca;
        $equipment->modelo = $request->modelo;
        $equipment->num_serie = $request->num_serie;
        $equipment->description = $request->description;
        $equipment->qtd = $request->qtd;

        $equipment->update();

        return redirect()->route('equipments.index')->with('alertSuccess', 'Atualizado!');
    }

    public function destroy($id) {
        $equipment = Equipment::find($id);

        $equipment->ativo = '0';
        $equipment->update();

        return redirect()->route('equipments.index')->with('alertDanger', 'Excluído!');
    }

}
