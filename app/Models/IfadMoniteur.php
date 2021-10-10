<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IfadMoniteur extends Model
{

    protected $guarded = [];

    protected $attributes=['datefin'=> null, 'etatsup'=> 0];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ifad()
    {
        return $this->belongsTo('App\Models\Ifad');
    }
}
