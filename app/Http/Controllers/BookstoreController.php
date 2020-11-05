<?php

namespace App\Http\Controllers;

use App\Bookstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookstoreController extends Controller
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
        $bookstores = Bookstore::all();

        return view('bookstores.index', compact('bookstores'));
    }

    public function allbookstores()
    {
        $bookstores = Bookstore::latest()->paginate(4);
        return view('bookstores.allbookstores', compact('bookstores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookstores.create');
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
            'nom',
            'complement',
            'adresse',
            'ville',
            'latitude',
            'longitude',
            'coordinates',
            'code_insee',
            'adresse_complet',
            'siret',
            'mail',
            'telephone',
            'site',
            'nom_city_ver'
        ]);

        $bookstore = new Bookstore([
            'nom' => $request->get('nom'),
            'complement' => $request->get('complement'),
            'adresse' => $request->get('adresse'),
            'ville' => $request->get('ville'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'coordinates' => $request->get('coordinates'),
            'code_insee' => $request->get('code_insee'),
            'adresse_complet' => $request->get('adresse_complet'),
            'siret' => $request->get('siret'),
            'mail' => $request->get('mail'),
            'telephone' => $request->get('telephone'),
            'site' => $request->get('site'),
            'nom_city_ver' => $request->get('nom_city_ver')
        ]);
        $bookstore->save();
        return redirect('/bookstores')->with('success', 'Bookstore saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookstore  $bookstore
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookstore = Bookstore::find($id);
        return view('bookstores.show', compact('bookstore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookstore  $bookstore
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('edit-users')) {
            return redirect()->route('bookstores.index');
        }
        $bookstore = Bookstore::find($id);
        return view('bookstores.edit', compact('bookstore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookstore  $bookstore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'nom' => 'required',
            'complement' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'coordinates' => 'required',
            'code_insee' => 'required',
            'adresse_complet' => 'required',
            'siret' => 'required',
            'mail' => 'required',
            'telephone' => 'required',
            'site' => 'required',
            'nom_city_ver' => 'required'
        ]);

        $bookstore = Bookstore::find($id);
        $bookstore->nom =  $request->get('nom');
        $bookstore->complement = $request->get('complement');
        $bookstore->adresse = $request->get('adresse');
        $bookstore->ville = $request->get('ville');
        $bookstore->latitude = $request->get('latitude');
        $bookstore->longitude =  $request->get('longitude');
        $bookstore->coordinates = $request->get('coordinates');
        $bookstore->code_insee = $request->get('code_insee');
        $bookstore->adresse_complet = $request->get('adresse_complet');
        $bookstore->siret = $request->get('siret');
        $bookstore->mail = $request->get('mail');
        $bookstore->telephone = $request->get('telephone');
        $bookstore->site = $request->get('site');
        $bookstore->nom_city_ver = $request->get('nom_city_ver');
        $bookstore->save();

        return redirect('/bookstores')->with('success', 'Bookstore updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookstore  $bookstore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('bookstores.index');
        }
        bookstore::where('id', $id)->delete();
        return redirect()->back();
    }
}
