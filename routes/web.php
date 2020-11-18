<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//route pour peoples
Route::resource('peoples', 'PeopleController');
//Route::get('/peoples.create', 'PeopleController@selectSearch');
//route pour books
Route::resource('books', 'BookController');
//route pour suggestions
Route::resource('suggestions', 'SuggestionController');
//route pour bootstores
Route::resource('bookstores', 'BookstoreController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('users', 'UsersController');
});

//Route::get('search', 'Select2SearchController@index');
Route::get('/ajax-autocomplete-search', 'SubcategorieController@selectSearch')->name('search');

Route::get('/all', 'BookController@allbooks')->name('books.all');
Route::get('/allbookstores', 'BookstoreController@allbookstores')->name('bookstores.allbookstores');
Route::get('/allpeoples', 'PeopleController@allpeoples')->name('peoples.allpeoples');

//import and export for controller books
Route::post('import', 'BookController@import')->name('import');
Route::get('export', 'BookController@export');
Route::get('importExportView', 'BookController@importExportView');

//import and export for controller bookstores
Route::post('import', 'BookstoreController@import')->name('import');
Route::get('export', 'BookstoreController@export');
Route::get('importExportView', 'BookstoreController@importExportView');

//import and export for controller peoples
Route::post('import', 'PeopleController@import')->name('import');
Route::get('export', 'PeopleController@export');
Route::get('importExportView', 'PeopleController@importExportView');