<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Terbilang extends Model
{
    //
    public $guarded = [];

    public $table   = 'terbilang';

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])
    //         ->translatedFormat('l, d  F Y');
    // }
}
