<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
/*    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }*/

    protected $table = 'roles';
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }


    
}
