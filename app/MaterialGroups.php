<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialGroups extends Model
{
    protected $table = 'material_groups';

    public $timestamps = false;


    public function materials()
    {
        return $this->hasMany('App\Material');
    }

}
