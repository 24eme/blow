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
    return view('frontend/home');
});
Route::post('/addEvent', 'EvenementController@InsertEvent');

Route::put('/updateEvent/{id}', 'EvenementController@updateEvent');


//Honorine
Route::get('/', 'EvenementController@list');
Route::get('json-list-events', 'EvenementController@listTest'); //pour les evenements

Route::get('json-list-resources', 'RoomController@listTest'); //pour les resources

// //Rediriger si pas connecté
// Route::group(['middleware' => ['auth']], function() {
//   return view('index');
// });
