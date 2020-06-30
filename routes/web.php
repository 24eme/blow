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
    // return view('components/testModale'); //honorine je l'ai créer pour inserer un evenement dans ma base de donéne avec un modale
    return view('home');
});

//Affichage des evenements
Route::get('showEvents', 'EventController@show');
//Affichage des salles
Route::get('showRooms', 'RoomController@show');
//Permet de créer un événement honorine
Route::post('createEvents','EventController@create');













// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
