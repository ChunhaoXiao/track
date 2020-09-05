<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function scopeName($query, $name) {
        if(empty($name)) {
            return $query;
        }
        return $query->where('name', 'like', '%'.$name.'%');
    }
}
