<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Measures extends Model
{
    protected $table = 'measures';

    public $timestamps = false;


    //each measure has many materials
    public function materials()
    {
        return $this->hasMany('App\Material');
    }
}
