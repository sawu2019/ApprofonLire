<?php

namespace App\Http\Controllers;

use App\Sublivres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SublivresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sublivrees = Sublivres::all();

        return view('suggestions.livres.index', compact('sublivrees')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggestions.livres.create');
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
            'nom_livre',
            'auteur'
        ]);
        $sublivres = new Sublivres([
            'nom_livre' => $request->get('nom_livre'),
            'auteur' => $request->get('auteur'),
            'mail' => $request->get('mail')
        ]);
        $sublivres->save();
        return redirect('livres')->with('success', 'Suggestion saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sublivres  $sublivres
     * @return \Illuminate\Http\Response
     */
    public function show(Sublivres $sublivres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sublivres  $sublivres
     * @return \Illuminate\Http\Response
     */
    public function edit(Sublivres $sublivres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sublivres  $sublivres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sublivres $sublivres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sublivres  $sublivres
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('suggestions.livres.index');
        }
        Sublivres::where('id', $id)->delete();
        return redirect()->back();
    }
}
