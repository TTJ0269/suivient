<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

    public function type_activite()
    {
        return $this->hasMany('App\Models\TypeActivite');
    }

    public function activite_saisie()
     {
         return $this->hasMany('App\Models\ActiviteSaisie');
     }
}
