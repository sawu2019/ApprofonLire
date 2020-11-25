<?php

namespace App\Http\Controllers;

use App\Subinterv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubintervController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subintervs = Subinterv::all();

        return view('suggestions.interview.index', compact('subintervs')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggestions.interview.create');
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
            'url'
        ]);
        $subinterv = new Subinterv([
            'nom' => $request->get('nom'),
            'url' => $request->get('url'),
            'mail' => $request->get('mail')
        ]);
        $subinterv->save();
        return redirect('interview')->with('success', 'Suggestion saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subinterv  $subinterv
     * @return \Illuminate\Http\Response
     */
    public function show(Subinterv $subinterv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subinterv  $subinterv
     * @return \Illuminate\Http\Response
     */
    public function edit(Subinterv $subinterv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subinterv  $subinterv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subinterv $subinterv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subinterv  $subinterv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('suggestions.interview.index');
        }
        Subinterv::where('id', $id)->delete();
        return redirect()->back();
    }
}
