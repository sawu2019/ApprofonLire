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