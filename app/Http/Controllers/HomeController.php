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
        $this->middleware('auth')->except(['index','show','home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $livre = DB::table('books')->get();
        $librairie = DB::table('bookstores')->get();
        $personnalite = DB::table('people')->get();
        $Beaux_livres = People::where('categorie_id','1')->get();
        $Bd_mangas = People::where('categorie_id','2')->get();
        $Economie_droit = People::where('categorie_id','3')->get();
        $Essais_documents = People::where('categorie_id','4')->get();
        $Fiction_romans = People::where('categorie_id','5')->get();
        $Jeunesse = People::where('categorie_id','6')->get();
        $Litterature_classique = People::where('categorie_id','7')->get();
        $Science_techniques = People::where('categorie_id','8')->get();
        $Scolaires = People::where('categorie_id','9')->get();
        $Science_humaines = People::where('categorie_id','10')->get();
        $Podcast = People::where('categorie_id','11')->get();
        $Pratique = People::where('categorie_id','12')->get();
        return view('home', compact('livre','librairie','personnalite'));
    }
}
