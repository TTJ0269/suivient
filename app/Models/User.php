<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type_utilisateur_id',
        'nomutilisateur',
        'prenomutilisateur',
        'telutilisateur',
        'imageutilisateur',
        'etat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes=['etat'=> 1,'etatsup'=> 0,'etatconnection'=> 0];

    public function type_utilisateur()
    {
        return $this->belongsTo('App\Models\TypeUtilisateur');
    }

    public function ifad()
    {
        return $this->hasMany('App\Models\Ifad');
    }

    public function rapport()
    {
        return $this->hasMany('App\Models\Rapport');
    }

    public function commentaire()
     {
         return $this->hasMany('App\Models\Commentaire');
     }
}
