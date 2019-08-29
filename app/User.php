<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Permission;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo', 
        'bloco', 
        'apto', 
        'name', 
        'cpf',  
        'genre', 
        'dt_nasc',
        'phone1',  
        'foto', 
        'residente1', 
        'residente2', 
        'residente3', 
        'residente4', 
        'residente5', 
        'idade_residente1', 
        'idade_residente2', 
        'idade_residente3', 
        'idade_residente4', 
        'idade_residente5', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    //um usuario pertence a um estado
    public function uf() {
        return $this->belongsTo(Models\Uf::class);
    }
    
    //um usuario pertence a uma estaca
    public function stake() {
        return $this->belongsTo(Models\Stake::class);
    }
    
    //um usuario pertence a uma unidade
    public function ward(){
        return $this->belongsTo(Models\Ward::class);
    }
    
    //um usuario pertence a uma cidade
    public function city() {
        return $this->belongsTo(Models\City::class);
    }
    
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
    
    public function hasPermission(Permission $permission) {
        //verifica quais são os perfis associados a esta permissão ex: view_post -> manager, editor
        return $this->hasAnyRoles($permission->roles);
    }
    
    public function hasAnyRoles($roles) {
        //verifica quantos roles estão associadas ao usuario
        if (is_array($roles) || is_object($roles)){
            return !! $roles->intersect($this->roles)->count();
        }
        //traz o nome do perfil
        return $this->roles->contains('name', $roles);
    }

}
