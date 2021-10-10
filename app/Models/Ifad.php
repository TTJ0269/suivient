<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ifad extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

     //Pour recuperer les utilisateurs qui appartient à l'IFAD
     public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
