<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'swiper' => 'array',
        //'ip_blacklist' => 'array',
    ];

    public function setFrequencyAttribite($v) {
        $this->attributes['frequency'] = intval($v);
    }

    public function setIpBlacklistAttribute($v) {
        if(empty($v)) {
            return $this->attributes['ip_blacklist'] = '';
        }

        $str = str_replace([',', ' ', ';', '，'], ',', $v);
        $strArr = explode(',', $str);
        $strArr = array_map('trim', $strArr);
        $strArr = array_filter($strArr, function($item) {
            return filter_var($item, FILTER_VALIDATE_IP);
        });
        $this->attributes['ip_blacklist'] = implode(',', $strArr);
    }
}
