<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function equipmentRents() {
        return $this->hasMany(EquipmentRent::class);
    }
}
