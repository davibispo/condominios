<?php

namespace App\Models;
use App\Models\CaravanUser;

use Illuminate\Database\Eloquent\Model;

class Caravan extends Model
{
    public function caravanUsers() {
        return $this->hasMany(CaravanUser::class);
    }
}
