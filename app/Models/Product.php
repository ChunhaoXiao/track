<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'pictures' => 'array',
    ];

    protected $with = [
        'company'
    ];
    
    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function scopeSearch($query, $where) {
        $where = array_filter($where);
        if(!empty($where)) {
            $fields = ['name', 'company', 'brand'];
            foreach($where as $k => $value) {
                if(in_array($k, $fields)) {
                    $query->$k($value);
                }
            }
        }
        return $query;
    }

    public function scopeName($query, $name) {
        return $query->where('name', 'like', '%'.$name.'%');
    }

    public function scopeCompany($query, $company) {
        return $query->where('company_id', $company);
    }

    public function scopeBrand($query, $brand) {
        return $query->where('brand', $brand);
    }
}
