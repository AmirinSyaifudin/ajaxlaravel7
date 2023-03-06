<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public $table   = 'provinsi';

    public $guarded = [];

    protected $primaryKey = 'provinsi_id ';
}
