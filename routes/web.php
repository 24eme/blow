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
    //return view('components/TestModaleRoomHono'); //honorine je l'ai créer pour inserer un evenement dans ma base de donéne avec un modale
    return view('home');
});

Route::get('/testUpdateEvent', function () {
    return view('components/testUpdateEvent'); //sidiTest
});


//Affichage des evenements
Route::get('showEvents', 'EventController@show');
//supprimer un événemment
Route::delete('delete/{id}', 'EventController@delete');
//update un événemment
Route::put('update/{id}', 'EventController@update');

//Affichage des salles
Route::get('showRooms', 'RoomController@show');
//Permet de créer un événement honorine
Route::post('createEvents','EventController@create');
//Permet de mettre à jour une salle honorine
Route::put('updateRooms','RoomController@update');




Route::get('/', 'RoomController@index');
Route::get('/', 'EventController@index');
Route::post('/createRoom', 'RoomController@create')->name('createRoom');
Route::get('/deleteRoom/{roomname}', 'RoomController@delete')->name('deleteRoom');














// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
