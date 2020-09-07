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
        return $this->belongsTo(Batch::class, 'batch_id')->withDefault();
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id')->withDefault();
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id')->withDefault();
    }

    public function history() {
        return $this->hasMany(History::class, 'code_id');
    }

    // public function setSecurityCodeAttribute($v) {
    //     $this->attributes['security_code'] = $this->batch->batch_number.$this->code;
    // }

    public function scopeFilter($query, $data) {
        $fields = ['security_code', 'product_id'];
        foreach($data as $k => $v) {
            if(strlen($v)) {
                if(in_array($k, $fields)) {
                    $query->where($k, $v);
                }
            }
        }
        return $query;
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            $model->security_code = $model->batch->batch_number.$model->code;           
        });
    }

    
}
