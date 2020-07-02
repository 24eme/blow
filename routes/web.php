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

Route::get('/modalCEvent', function () {
    return view('components/modalCEvent'); //sidiTest
});

// ----------------------------------------------------EndTest-------------------------------------------------------------


//Affichage des evenements
Route::get('/showEvents', 'EventController@show');
//supprimer un événemment
Route::get('/deleteEvent/{id}', 'EventController@delete')->name('deleteEvent');
//update un événemment
Route::post('/updateEvent', 'EventController@update')->name('UpdateEvent');

//Affichage des salles
Route::get('/showRooms', 'RoomController@show');
//Permet de créer un événement honorine
Route::post('/createEvent','EventController@create')->name('createEvent');
//Permet de mettre à jour une salle honorine
Route::post('/updateRoom','RoomController@update')->name('UpdateRoom');



Route::post('/createRoom', 'RoomController@create')->name('createRoom');
Route::get('/deleteRoom/{id}', 'RoomController@delete')->name('deleteRoom');






// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

//admin honorine
// Route::get('/admin', 'AdminController@admin')
//     ->middleware('is_admin')
//     ->name('admin');
