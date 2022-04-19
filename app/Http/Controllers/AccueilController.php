<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }
  
    public function dash()
    {
        try
        {
            $users                    = DB::table('users')->count();
            $ifads                    = DB::table('ifads')->count();
            $rapports                 = DB::table('rapports')->count();
            $livret_positionnements   = DB::table('livret_positionnements')->count();

            return view('dashboard',compact('users','ifads','rapports','livret_positionnements'));
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    public function template()
    {
        return view('charts.index-chart');
    }

    public function Erreur()
    {
        return view('Erreur.erreur');
    }
    
}
