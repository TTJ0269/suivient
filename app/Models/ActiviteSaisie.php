<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiviteSaisie extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

    public function fichier()
    {
        return $this->hasMany('App\Models\Ficher');
    }

    public function fonction()
    {
        return $this->belongsTo('App\Models\Fonction');
    }

}
