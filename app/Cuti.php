<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cuti extends Model
{
    public $timestamps = false;
    public $guarded = [];

    public $table   = 'cuti';
    protected $primaryKey = 'cuti_id ';

    public function getCover()
    {
        if (substr($this->cover, 0, 5) == "https") {
            return $this->cover;
        }

        if ($this->cover) {
            return asset($this->cover);
        }
        
        //https://placeholder.com/
        return 'https://via.placeholder.com/150x200.png?text=No+Cover';
    }

}