<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class User extends Authenticatable
{
    use AppModel;
    use Notifiable;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'is_enabled'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'user_has_roles');
    }

    public function notifications() {
        return $this->hasMany('App\Models\Notification');
    }

    public function isSuper() {
        $hasRole = !! $this->roles()->where('role_id', config('constants.roles.super'))->count();
        return $hasRole;
    }

    public function myLists(){
        return $this->hasMany('App\Models\MyList');
    }
}
