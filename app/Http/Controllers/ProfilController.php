<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{

    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }
    /** Recuperation des informations de l'utilisateur connecte **/
    public function show()
    {
      try
      {
        $users_id =(Auth::user())->id;
        $users = DB::table('users')->select(['users.*'])->where('users.id','=',$users_id)->get();
        return view('profil.profilshow', compact('users'));
      }
      catch(\Exception $exception)
     {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
     }
    }

    /** Modification de l'email et name de l'utilisateur **/
    public function changeemail()
    {
      try
      {
          /** Recuperation des informations du formulaire profilshow  **/
          $id=request('id');
          $name=request('name');
          $email=request('email');

          /** Actualisation ou mise a jour de donnes name et email **/
          $user = DB::table('users')->where('users.id','=',$id)->update(['users.name' => $name, 'users.email' =>$email]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Profil',
            'attribute' => $email,
            'action'=> 'modification',
          ]);

          return redirect('profil')->with('message','Informations bien mise à jour');
      }
      catch(\Exception $exception)
     {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
     }
    }

    public function changepassword()
    {
      try
      {
          /** Recuperation des informations du formulaire profilshow  **/
          $users_email =(Auth::user())->email;
          $id=request('id');
          //$lastpassword=request('lastpassword');
          $password=request('password');
          $confirmation=request('confirmepassword');
          // $passwordchiffre = Hash::make($lastpassword);

          // $emailuser = DB::table('users')->where('users.email','=',$users_email)->select('users.password')->first()->password;

          $this->validator();

          if($password!=$confirmation)
          {
            return redirect('profil')->with('messagealert', 'Mots de passe différents.');
          }
          else
          {
              $user = DB::table('users')->where('users.id','=',$id)->update(['users.password' => Hash::make($password)]);

              $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
              /** historiques des actions sur le systeme **/
              $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Profil',
                'attribute' => 'mot de passe',
                'action'=> 'modification',
              ]);

              return redirect('profil')->with('message','Informations bien mise à jour');
          }
      }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
    }

    public function changephoto(Request  $request)
    {
      try
      {
            /** Recuperation des informations du formulaire profilshow  **/
            $id=request('id');
            $image=request('image');

        if($request->file('image'))
        {
            /** Stokage de l'image  **/
          $file=$request->file('image');
          $filename=time().'.'.$file->getClientOriginalExtension();
          $request->image->move('storage/image/', $filename);

            
            /** Actualisation ou mise a jour de donnes name et email **/
            $user = DB::table('users')->where('users.id','=',$id)->update(['users.imageutilisateur' => $filename]);

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Profil',
              'attribute' => 'photo',
              'action'=> 'modification',
            ]);

            return redirect('profil')->with('message','Informations bien mise à jour');
        }
        elseif($image==null)
        {
          return redirect('profil')->with('messagealert',"Désolé vous n'avez pas choix d'image");
        }
       
      }
      catch(\Exception $exception)
     {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
     }
    }

    private  function validator()
    {
        return request()->validate([
            'password'=>'required|min:8',
            'confirmepassword'=>'required|min:8',
        ]); 
    } 
}
