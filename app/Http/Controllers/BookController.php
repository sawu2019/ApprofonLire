<?php

namespace App\Http\Controllers;

use App\Book;
use App\People;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('people')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peoples = People::all();
        return view('books.create', compact('books', 'peoples'));
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
            'auteur' => 'required',
            'editeur' => 'required',
            'purch_link' => 'required',
            'notes' => 'required',
            'sharetext' => 'required',
        ]);

        $book = new Book([
            'nom' => $request->get('nom'),
            'photo' => $request->get('photo'),
            'auteur' => $request->get('auteur'),
            'editeur' => $request->get('editeur'),
            'purch_link' => $request->get('purch_link'),
            'notes' => $request->get('notes'),
            'sharetext' => $request->get('sharetext'),
            'people_id' => $request->get('people_id')
        ]);
        $book->save();
        return redirect('/books')->with('success', 'book saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peoples = People::all();
        $book = Book::find($id);
        return view('books.show', compact('book','peoples'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $peoples = People::all();
        return view('books.edit', compact('book', 'peoples'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'photo' => 'required',
            'auteur' => 'required',
            'editeur' => 'required',
            'purch_link' => 'required',
            'notes' => 'required',
            'sharetext' => 'required',
        ]);
        $book = Book::find($id);
        $book->nom =  $request->get('nom');
        $book->photo = $request->get('photo');
        $book->auteur = $request->get('auteur');
        $book->editeur = $request->get('editeur');
        $book->purch_link = $request->get('purch_link');
        $book->notes = $request->get('notes');
        $book->sharetext = $request->get('sharetext');
        $book->people_id = $request->get('people_id');
        $book->save();

        return redirect('/books')->with('success', 'book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book::where('id', $id)->delete();
        return redirect()->back();
    }
}
