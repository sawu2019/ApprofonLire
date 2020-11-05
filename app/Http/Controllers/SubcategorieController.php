<?php

namespace App\Http\Controllers;

use App\Subcategorie;
use Illuminate\Http\Request;

class SubcategorieController extends Controller
{
    public function selectSearch(Request $request)
    {
    	$subcategories = [];

        if($request->has('q')){
            $search = $request->q;
            $subcategories =Subcategorie::search($search);
        }
        return response()->json($subcategories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategorie $subcategorie)
    {
        //
    }
}
