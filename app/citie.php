<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citie extends Model
{
    //
    protected $table = 'cities';

    public function governorates()
    {
        return $this->belongsTo(governorate::class,'gov_id','id');
    }
}
