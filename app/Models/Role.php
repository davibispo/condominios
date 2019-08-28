<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Permission;

class Role extends Model
{
    public function users() {
        return $this->belongsToMany(User::class);
    }
    
    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }
}
