<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Message;

class StakeController extends Controller
{
    public function index() {
        $stake = auth()->user()->stake;
        $messages = Message::all()->where('stake', $stake)->where('ativo','1');
        $users = User::all()->where('stake',$stake);

        return view('stakes.index', compact('stake','messages','users'));
    }
}
