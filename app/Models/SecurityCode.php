<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityCode extends Model
{
    protected $fillable = [
        'code',
        'product_id',
        'company_id',
        'batch_id',
        'security_code',
    ];

    protected $withCount = [
        'history'
    ];

    public function batch() {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function history() {
        return $this->hasMany(History::class, 'code_id');
    }

    // public function setSecurityCodeAttribute($v) {
    //     $this->attributes['security_code'] = $this->batch->batch_number.$this->code;
    // }

    protected static function booted()
    {
        static::saving(function ($model) {
            $model->security_code = $model->batch->batch_number.$model->code;           
        });
    }
}
