<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\EquipmentRent;
use App\User;

class EquipmentRentController extends Controller
{

    public function index()
    {
        $stake = auth()->user()->stake;
        $users = User::all()->where('stake', $stake);
        $equipmentRents = EquipmentRent::all()->where('stake', $stake)->where('ativo','1')->sortByDesc('created_at');
        
        return view('stakes.equipment-rents.index', compact('stake','equipmentRents','users'));
    }

    public function create()
    {
        $stake = auth()->user()->stake;
        $equipments = Equipment::all()->where('stake', $stake)->where('ativo','1');
        return view('stakes.equipment-rents.create', compact('stake','equipments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'reason_get' => 'required|string|max:400',
        ]);
        
        $equipmentRent = new EquipmentRent();
        
        $equipmentRent->stake = auth()->user()->stake;
        $equipmentRent->user_id = auth()->user()->id;
        $equipmentRent->equipment_id = $request->equipment_id;
        $equipmentRent->get_date = $request->get_date;
        $equipmentRent->return_date = $request->return_date;
        $equipmentRent->reason_get = $request->reason_get;
        $equipmentRent->status = $request->status;
        
        $equipmentRent->save();
        
        return redirect()->route('equipment-rents.index')->with('alertSuccess', 'Solicitação realizada! Acompanhe seu pedido em Status');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $stake = auth()->user()->stake;
        $equipmentRent = EquipmentRent::find($id);
        $userName = User::where('id',$equipmentRent->user_id)->value('name');
        $userLastname = User::where('id',$equipmentRent->user_id)->value('lastname');
        $userPhone = User::where('id',$equipmentRent->user_id)->value('phone');
        $userWard = User::where('id',$equipmentRent->user_id)->value('ward');
        $equipment = Equipment::where('id', $equipmentRent->equipment_id)->value('name');
        
        return view('stakes.equipment-rents.update', compact('equipmentRent','stake','userName','userLastname','userPhone','userWard','equipment'));
        
    }

    public function update(Request $request, $id)
    {
        $equipmentRent = EquipmentRent::find($id);
        
        $equipmentRent->status = $request->status;
        
        /*
        * status:
        * 1-Solicitado;
        * 2-Liberado para retirada
        * 3-Devolvido
        * 4-Negado
        */

        if ($equipmentRent->status == '4'){
            $equipmentRent->reason_refuses = $request->reason_refuses;
            $equipmentRent->update();
            return redirect()->route('equipment-rents.index')->with('alertDanger', 'Solicitação negada!');
        }
        elseif($equipmentRent->status == '3'){
            $equipmentRent->update();
            return redirect()->route('equipment-rents.index')->with('alertSuccess', 'Equipamento devolvido!');
        }
        elseif($equipmentRent->status == '2'){
            $equipmentRent->update();
            return redirect()->route('equipment-rents.index')->with('alertSuccess', 'Equipamento liberado para retirada!');
        }
        
        
    }

    public function destroy($id)
    {
        $quipmentRent = EquipmentRent::find($id);
        
        $quipmentRent->ativo = '0';
        $quipmentRent->update();
        
        return redirect()->route('equipment-rents.index')->with('alertDanger', 'Solicitação excluída!');
    }
}
