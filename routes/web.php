<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
})->name('home');;

Route::post('/ManagedEvent', 'EventController@ManagedEvent');

Route::post('/ManagedEvent/{id}', 'EventController@ManagedEvent');


//Honorine
Route::get('/', 'EventController@showEvents');
Route::get('json-list-events', 'EventController@createEventsJson'); //pour les evenements

Route::get('json-list-resources', 'RoomController@createRoomsJson'); //pour les resources



// //Rediriger si pas connecté
// Route::group(['middleware' => ['auth']], function() {
//   return view('index');
// });

Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
