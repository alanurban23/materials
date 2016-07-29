<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    public $timestamps = false;


    public function measures()
    {
        return $this->belongsTo('App\Measures');
    }

    public function material_groups()
    {
        return $this->belongsTo('App\MaterialGroups');
    }
}
