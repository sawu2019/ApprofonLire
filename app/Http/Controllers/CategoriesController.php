<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoris = Categorie::where('parent_id', 0)->get();

        return view('welcome', ["categoris" => $categoris]);
    }

    public function subCategorie(Request $request)
    {
        $parent_id = $request->cat_id;

        $subcategories = Categorie::where('id', $parent_id)
            ->with('subcategories')->get();

        return response()->json(['subcategories' => $subcategories]);
    }

}
