<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
  
    public function dash()
    {
        try
        {
            $users             = DB::table('users')->count();
            $ifads             = DB::table('ifads')->count();
            $rapports          = DB::table('rapports')->count();
            $activites         = DB::table('activites')->count();

            return view('dashboard',compact('users','ifads','rapports','activites'));
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    public function Erreur()
    {
        return view('Erreur.erreur');
    }
}
