<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('People','categories')->get();
        $culture = People::where('categorie_id','1')->get();
        $economie = People::where('categorie_id','2')->get();
        $habitat = People::where('categorie_id','3')->get();
        $sante = People::where('categorie_id','4')->get();
        $social = People::where('categorie_id','5')->get();
        $sport = People::where('categorie_id','6')->get();
        $politique = People::where('categorie_id','7')->get();
        return view('home', compact('data','culture','economie','habitat','sante','social','sport','politique'));
    }
}
