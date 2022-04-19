<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeUtilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatutPolicy
{
    use HandlesAuthorization;

    public function autorisationMoniteur(User $user)
    {
        try
        {
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);

            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();
            if($type_utilisateur->libelletype == 'Moniteur ENT')
            {
                if($type_utilisateur->id == $user->type_utilisateur_id)
                {
                return true;
                }
            }
            else
            {
            return false;
            }
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        try
        {
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);

            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();
            if($type_utilisateur->libelletype == 'Responsable du suivi')
            {
                if($type_utilisateur->id == $user->type_utilisateur_id)
                {
                return true;
                }
            }
            else
            {
            return false;
            }
        }
            catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        try
        {
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);

            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();
            if($type_utilisateur->libelletype == 'Administrateur')
            {
                if($type_utilisateur->id == $user->type_utilisateur_id)
                {
                return true;
                }
            }
            else
            {
            return false;
            }
        }
            catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /** Profil DG IFAD **/

    public function dgifad(User $user)
    {
        try
        {
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);

            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();
            if($type_utilisateur->libelletype == 'DG IFAD')
            {
                if($type_utilisateur->id == $user->type_utilisateur_id)
                {
                return true;
                }
            }
            else
            {
            return false;
            }
        }
            catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /** Profil DG IFAD **/

    public function superviseur(User $user)
    {
        try
        {
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);

            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();
            if($type_utilisateur->libelletype == 'Superviseur')
            {
                if($type_utilisateur->id == $user->type_utilisateur_id)
                {
                return true;
                }
            }
            else
            {
            return false;
            }
        }
            catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
