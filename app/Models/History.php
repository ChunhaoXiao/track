<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'code_id', 'ip'
    ];

    public function code() {
        return $this->belongsTo(SecurityCode::class, 'code_id');
    }
}
