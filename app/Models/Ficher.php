<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficher extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

    public function activite_saisy()
    {
        return $this->belongsTo('App\Models\ActiviteSaisie');
    }
}
