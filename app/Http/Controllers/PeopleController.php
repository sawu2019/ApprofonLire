<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
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

    public function culture()
    {
        $peoples = People::where('categorie_id','1')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function entreprise()
    {
        $peoples = People::where('categorie_id','2')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function habitat()
    {
        $peoples = People::where('categorie_id','3')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function hightech()
    {
        $peoples = People::where('categorie_id','4')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function social()
    {
        $peoples = People::where('categorie_id','5')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function sport()
    {
        $peoples = People::where('categorie_id','6')->get();
        return view('peoples.index', compact('peoples'));
    }

    public function politique()
    {
        $peoples = People::where('categorie_id','7')->get();
        return view('peoples.index', compact('peoples'));
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

        people::where('id', $id)->delete();
        return redirect()->back();
        //$people = People::find($id);
        //$people->delete();
        //return redirect('/peoples')->with('success', 'People deleted!');
    }
}
