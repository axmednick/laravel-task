<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admins extends Authenticatable
{
    protected $guarded=[];

    protected $table = 'admins';

    public function role()
    {
        return $this->hasOne('App\Role','id','role_id');
    }
}
