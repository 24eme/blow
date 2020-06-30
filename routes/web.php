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
    return view('home');
});

//Affichage des evenements
Route::get('showEvents', 'EventController@show');

//supprimer un événemment
Route::get('deleteEvent/{id}', 'EventController@deleteEvent');

//Affichage des salles
Route::get('showRooms', 'RoomController@show');












// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
