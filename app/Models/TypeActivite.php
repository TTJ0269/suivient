<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActivite extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

    public function fonction()
    {
        return $this->belongsTo('App\Models\Fonction');
    }

    public function activite()
     {
         return $this->hasMany('App\Models\Activite');
     }
}
