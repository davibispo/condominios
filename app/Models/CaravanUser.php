<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Caravan;

class CaravanUser extends Model
{
    public function caravan() {
        return $this->belongsTo(Caravan::class);
    }
    
    public function users() {
        $users = User::all();
        return $this->hasMany($users);
    }
}
