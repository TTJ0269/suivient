<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivretPositionnement extends Model
{
    protected $guarded = [];

    protected $attributes=['etatsup'=> 0];

    public function rapport()
    {
        return $this->belongsTo('App\Models\rapport');
    }
}
