<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

    public function rapport()
    {
        return $this->belongsTo('App\Models\Rapport');
    }

    public function ficher()
     {
         return $this->hasMany('App\Models\Ficher');
     }

     public function typeactivite()
    {
        return $this->belongsTo('App\Models\TypeActivite');
    }
}
