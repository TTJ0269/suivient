<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }
    
    public function index()
    {
        try
        {
            $historiques = Historique::orderBy('id','DESC')->get();

            return view('historiques.index',compact('historiques'));
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }
}
