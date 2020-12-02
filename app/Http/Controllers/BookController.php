<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exports\ExportBooks;
use App\Imports\ImportBooks;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;


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
    public function allbooks()
    {
        $books = Book::latest()->paginate(4);
        return view('books.all', compact('books'));
    }
    public function importExportView()
    {
       return view('import');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ExportBooks, 'Books.xlsx');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'CustomerName'  => $row['customer_name'],
         'Gender'   => $row['gender'],
         'Address'   => $row['address'],
         'City'    => $row['city'],
         'PostalCode'  => $row['postal_code'],
         'Country'   => $row['country']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('tbl_customer')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
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
            'nom' => 'required|max:255',
            'photo' => 'required|max:255',
            'auteur' => 'required|max:255',
            'editeur' => 'required|max:255',
            'purch_link' => 'required|max:255',
            'notes' => 'required|max:255',
            'sharetext' => 'required|max:255',
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
        if (Gate::denies('delete-users')) {
            return redirect()->route('books.index');
        }
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
            'nom' => 'required|max:255',
            'photo' => 'required|max:255',
            'auteur' => 'required|max:255',
            'editeur' => 'required|max:255',
            'purch_link' => 'required|max:255',
            'notes' => 'required|max:255',
            'sharetext' => 'required|max:255',
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
        if (Gate::denies('delete-users')) {
            return redirect()->route('books.index');
        }
        book::where('id', $id)->delete();
        return redirect()->back();
    }
}
