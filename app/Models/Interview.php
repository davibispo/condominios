<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Interview extends Model {

    public function users() {
        return $this->hasMany(User::class);
    }
}
