<?php

namespace Bookstore;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public function roles(){
        return $this->belongsToMany('Bookstore\Role');
    }
    public function isAdmin()
    {
        if ($this->role=='admin') {
            return true;
        }
        return false;
    }

    
    public function authorizeRoles($roles) {
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'This action is unauthorized');
        //return view('errors.401');
    }
    
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

        //logica necesaria para validar todos los roles
    public function hasRole($role){
        //si User en la tabla relacionada tiene un rol
        if ($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

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
}
