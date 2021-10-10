<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TypeUtilisateur;
use App\Mail\UserMail;
use App\Models\Historique;

class UserController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    /**public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }*/

    public function index()
   {
     try
     {
          /** $users = User::with('type_utilisateur')->paginate(5); **/ 

          $this->authorize('view', User::class);
          $users = User::all();
          $type_utilisateurs = TypeUtilisateur::all();

          return view('users.index', compact('users', 'type_utilisateurs'));
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

      /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
     try
     {
      $this->authorize('view', User::class);
        $user = new User();
        $type_utilisateurs = TypeUtilisateur::all();

        return view('users.create',compact('user', 'type_utilisateurs'));

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

     /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store(Request  $request)
   { 
     try
     {
        $this->authorize('view', User::class); 

        $emailuser = request('email');
        $username=request('nomutilisateur');
        $userprenom=request('prenomutilisateur');
      // $password = request('password');

        /** generation du mot de passe**/
        $pawd=30062000;
        $dateannee = now()->format('Y');
        $datemois = now()->format('m');
        $datejour = now()->format('d');
        $dateheure = now()->format('h');
        $dateminuit = now()->format('i');
        $dateseconde = now()->format('s');
        $a= ($pawd + $dateannee + $datemois + $datejour + $dateheure + $dateminuit + $dateseconde); 

        $users = new User;
        
        $users->name=request('name');
        $users->email=request('email');
        $users->password=Hash::make($a);
        $users->type_utilisateur_id=request('type_utilisateur_id');
        $users->nomutilisateur=request('nomutilisateur');
        $users->prenomutilisateur=request('prenomutilisateur');
        $users->telutilisateur=request('telutilisateur');
        if($request->file('image'))
        {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/image/', $filename);

            $users->imageutilisateur=$filename;
        }
        $users->save();

        $user = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
        /** historiques des actions sur le systeme **/
        $historique = Historique::create([
          'user'=> $user,
          'table'=> 'Utilisateur',
          'attribute' => $username. ' ' .$userprenom,
          'action'=> 'ajout',
        ]);

        $sendemail = ['email' => $emailuser , 'nomutilisateur' => $username , 'prenomutilisateur' => $userprenom, 'password' => $a];

        Mail::to($sendemail['email'])->send(new UserMail($sendemail));

        return redirect('users')->with('message', 'Utilisateur bien ajouté.');

    }
    catch(\Exception $exception)
    {
        return redirect('erreur')->with('messageerreur',$exception->getMessage());
    }

   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(User $user)
   { 
      try
      { 
        $this->authorize('view', User::class);
        return view('users.show',compact('user'));
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(User $user)
   {
      try
      {
        $this->authorize('view', User::class);
        $type_utilisateurs = TypeUtilisateur::all();
        return view('users.edit', compact('user', 'type_utilisateurs'));

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

      /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function update(User $user)
   {
     try
     {
      $this->authorize('view', User::class);
          $user->update([
              'name'=> request('name'),
              'nomutilisateur'=> request('nomutilisateur'),
              'prenomutilisateur'=> request('prenomutilisateur'),
              'email'=> request('email'),
              'type_utilisateur_id'=> request('type_utilisateur_id'),
              'telutilisateur'=> request('telutilisateur'),
              ]);

              $this->storeImage($user);

      $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
      /** historiques des actions sur le systeme **/
      $historique = Historique::create([
        'user'=> $huser,
        'table'=> 'Utilisateur',
        'attribute' => request('nomutilisateur'). ' ' .request('prenomutilisateur'),
        'action'=> 'modification',
      ]);

       return redirect('users/' . $user->id);

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(User $user)
   {
     try
     {
       $this->authorize('view', User::class);

         /** Recuperation du dernier en cours **/
         $reference = DB::table('ifad_moniteurs')
         ->where('ifad_moniteurs.user_id','=',Auth::user()->id)
         ->select('ifad_moniteurs.user_id')
         ->get()->last()->user_id;
 
        if($reference == null)
        {
            $user->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
           'user'=> $huser,
           'table'=> 'Utilisateur',
           'attribute' => $user->nomutilisateur. ' ' .$user->prenomutilisateur,
           'action'=> 'suppression',
           ]);

            return redirect('users');
        }
       return redirect('users')->with('messagealert','Cet utilisateur est referencé dans une autre table');

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
   }

   private  function validator()
   {
       return request()->validate([
           'name'=>'required',
           'nomutilisateur'=>'required',
           'prenomutilisateur'=>'required',
           'password'=>'required',
           'email'=>'required|email|min:8',
           'type_utilisateur_id'=>'required|integer',
           'telutilisateur'=>'required|integer',
       ]); 
   }

   private function storeImage(User $user)
   {
        if(request('imageutilisateur'))
        {
            $user->update([
             'imageutilisateur'=> request('imageutilisateur')->store('ImageUtilisateur','public'),
            ]);       
        }
   }

   public function GenerationNewPassword()
   {
     try
     {
        $id = request('id');
        $emailuser = request('email');
        $username=request('nomutilisateur');
        $userprenom=request('prenomutilisateur');


        /** generation du mot de passe**/
        $pawd=30062000;
        $dateannee = now()->format('Y');
        $datemois = now()->format('m');
        $datejour = now()->format('d');
        $dateheure = now()->format('h');
        $dateminuit = now()->format('i');
        $dateseconde = now()->format('s');
        $a= ($pawd + $dateannee + $datemois + $datejour + $dateheure + $dateminuit + $dateseconde); 


        
        $sendemail = ['email' => $emailuser , 'nomutilisateur' => $username , 'prenomutilisateur' => $userprenom, 'password' => $a];

        $user = DB::table('users')->where('users.id','=',$id)->update(['users.password' => Hash::make($a), 'users.etatconnection' => 0]);

        Mail::to($sendemail['email'])->send(new UserMail($sendemail));

        return redirect('users/' . $id)->with('message', 'Nouveau mot de passe bien régénérer.');

      }
      catch(\Exception $exception)
      {
        /** si erreur mot de passe par defaut **/
        $user = DB::table('users')->where('users.id','=',$id)->update(['users.password' => Hash::make(123456789), 'users.etatconnection' => 0]);

        return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     
   }

   public function ActiveCompte()
   {
     try
     {
      $user_id = request('id'); 

      $user = DB::table('users')->where('users.id','=',$user_id)->update(['users.etat' => 1]);

      return redirect('users/' . $user_id)->with('message', 'Compte bien activé.');

     }
    catch(\Exception $exception)
    {
        return redirect('erreur')->with('messageerreur',$exception->getMessage());
    }
   }

   public function BloquerCompte()
   {
     try
     {
      $user_id = request('id'); 

      $user = DB::table('users')->where('users.id','=',$user_id)->update(['users.etat' => 0]);

      return redirect('users/' . $user_id)->with('message', 'Compte bien bloqué.');

     }
    catch(\Exception $exception)
    {
        return redirect('erreur')->with('messageerreur',$exception->getMessage());
    }
   }
}
