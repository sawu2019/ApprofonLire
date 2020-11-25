<?php

namespace App\Http\Controllers;

use App\Notifications\NewSuggestion;
use App\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Notifications\Notifiable;

class SuggestionController extends Controller
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
        $suggestions = Suggestion::all();

        return view('suggestions.index', compact('suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggestions.create');
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
            'int_link',
            'book_aut',
            'type',
            'image',
            'user_mail'
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $suggestion = new Suggestion([
            'nom' => $request->get('nom'),
            'int_link' => $request->get('int_link'),
            'book_aut' => $request->get('book_aut'),
            'type' => $request->get('type'),
            'image' => $imagePath,
            'user_mail' => $request->get('user_mail')
        ]);
        $suggestion->save();
        // Notification
        //$suggestion->user->notify(new  NewSuggestion($suggestion, auth()->user()));
        return redirect('/suggestions')->with('success', 'Suggestion saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('suggestions.index');
        }
        $suggestion = Suggestion::find($id);
        return view('suggestions.edit', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'int_link' => 'required',
            'book_aut' => 'required',
            'type' => 'required',
            'user_mail' => 'required'
        ]);

        $suggestion = Suggestion::find($id);
        $suggestion->nom =  $request->get('nom');
        $suggestion->int_link = $request->get('int_link');
        $suggestion->book_aut = $request->get('book_aut');
        $suggestion->type = $request->get('type');
        $suggestion->user_mail = $request->get('user_mail');
        $suggestion->save();

        return redirect('/suggestions')->with('success', 'Suggestion updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('suggestions.index');
        }
        suggestion::where('id', $id)->delete();
        return redirect()->back();
    }
}
