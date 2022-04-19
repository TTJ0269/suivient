<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends Controller
{
    public function PasswordChangement()
    {
        $user_connection = (Auth::user()->etatconnection);
        $user_etat = (Auth::user()->etat);

        if($user_etat == 0)
        {
            Auth::logout();
            
            return back()->with('messagealert', 'Votre compte a été désactivé.');
        }
        elseif($user_connection == 0)
        {
            return view('auth.changepassword');
        }
        else
        {
            return redirect('dashboard');
        }
        
    }

    public function passwordchangementPost()
    {
        $user_id = (Auth::user()->id);
        $password = request('password');
        $confirmationpassword =request('confirmationpassword');

        if($password != $confirmationpassword)
        {
            return redirect('passwordchangement')->with('messagealert', "Mots de passe différents");
        }
        else
        {
           $user = DB::table('users')->where('users.id','=',$user_id)->update(['users.password' => Hash::make($password), 'users.etatconnection' => 1]);

           return redirect('dashboard');
        }
    }
}
