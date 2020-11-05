<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\User;
use App\People;
use App\Subcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PeopleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::with('categorie')->get();

        return view('peoples.index', compact('peoples'));
    }

    public function Beaux_livres()
    {
        $peoples = People::where('categorie_id','1')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Bd_mangas()
    {
        $peoples = People::where('categorie_id','2')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Economie_droit()
    {
        $peoples = People::where('categorie_id','3')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Essais_documents()
    {
        $peoples = People::where('categorie_id','4')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Fiction_romans()
    {
        $peoples = People::where('categorie_id','5')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Jeunesse()
    {
        $peoples = People::where('categorie_id','6')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Litterature_classique()
    {
        $peoples = People::where('categorie_id','7')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Science_techniques()
    {
        $peoples = People::where('categorie_id','8')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Scolaires()
    {
        $peoples = People::where('categorie_id','9')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Science_humaines()
    {
        $peoples = People::where('categorie_id','10')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Podcast()
    {
        $peoples = People::where('categorie_id','11')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function Pratique()
    {
        $peoples = People::where('categorie_id','12')->get();
        return view('peoples.index', compact('peoples'));
    }
    public function allpeoples()
    {
        $peoples = People::latest()->paginate(4);
        return view('peoples.allpeoples', compact('peoples'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        
        return view('peoples.create', compact('peoples','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'photo' => 'required',
            'title' => 'required',
            'ed_source' => 'required',
            'int_link' => 'required',
            'int_sub_categ' => 'required',
            'int_share_text' => 'required',
        ]);

        $people = new People([
            'nom' => $request->get('nom'),
            'photo' => $request->get('photo'),
            'title' => $request->get('title'),
            'ed_source' => $request->get('ed_source'),
            'int_link' => $request->get('int_link'),
            'int_sub_categ' => $request->get('int_sub_categ'),
            'int_share_text' => $request->get('int_share_text'),
            'categorie_id' => $request->get('categorie_id')
        ]);
        $people->save();
        return redirect('/peoples')->with('success', 'people saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::all();;
        $people = People::find($id);
        return view('peoples.show', compact('people','categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('edit-users')) {
            return redirect()->route('peoples.index');
        }

        $people = People::find($id);
        $categories = Categorie::all();
        return view('peoples.edit', compact('people','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'photo' => 'required',
            'title' => 'required',
            'ed_source' => 'required',
            'int_link' => 'required',
            'int_sub_categ' => 'required',
            'int_share_text' => 'required'
        ]);
        $people = People::find($id);
        $people->nom =  $request->get('nom');
        $people->photo = $request->get('photo');
        $people->title = $request->get('title');
        $people->ed_source = $request->get('ed_source');
        $people->int_link = $request->get('int_link');
        $people->int_sub_categ = $request->get('int_sub_categ');
        $people->int_share_text = $request->get('int_share_text');
        $people->categorie_id = $request->get('categorie_id');
        $people->save();

        return redirect('/peoples')->with('success', 'People updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('peoples.index');
        }
        people::where('id', $id)->delete();
        return redirect()->back();
    }
}
