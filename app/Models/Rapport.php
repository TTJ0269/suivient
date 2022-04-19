<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $guarded = [];

    protected $attributes=['etat'=> 0,'etatsup'=> 0];

    public function activite()
    {
        return $this->hasMany('App\Models\Activite');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ifad_moniteur()
    {
        return $this->belongsTo('App\Models\IfadMoniteur');
    }

    public function livret_positionnements()
    {
        return $this->hasMany('App\Models\LivretPositionnement');
    }
}
