<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $fillable = [
        'name', 'password', 'last_login_time', 'last_login_ip'
    ];

    public function setPasswordAttribute($v) {
        $this->attributes['password'] = bcrypt($v);
    }
}
