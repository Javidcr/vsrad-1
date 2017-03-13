<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $roles = [
        'cliente', 'comercial', 'tecnico', 'director_comercial', 'administrador'
    ];

    public static $title = [
        'Cliente', 'Comercial', 'Técnico', 'Director Comercial', 'Administrador'
    ];


    public function hasRole($role)
    {
        return User::$roles[$this->role] == $role;
    }

    public function getRole() {
        return User::$roles[$this->role];
    }

    public function getCompleteName() {
        return User::$title[$this->role] . ". " . $this->name;
    }

    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'cliente_id');
    }


}
