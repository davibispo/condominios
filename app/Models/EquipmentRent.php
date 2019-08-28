<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;
use App\User;

class EquipmentRent extends Model
{
    public function equipment() {
        return $this->belongsTo(Equipment::class);
    }
    
    public function users() {
        $users = User::all();
        return $this->hasMany($users);
    }
}
