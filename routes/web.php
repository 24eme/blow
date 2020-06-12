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
Route::get('/reserver', function() {
        return view('frontend/reserver');
});
Route::get('/trombinoscope', function() {
        return view('frontend/trombinoscope');
});
Route::get('/aide', function() {
        return view('frontend/aide');
});
Route::post('/addEvent', 'addEvent@InsertEvent');

//Honorine
Route::get('/', 'EvenementController@list');
Route::get('json-list-events', 'EvenementController@listTest'); //pour les evenements
Route::get('json-list-resources', 'SalleController@listTest'); //pour les resources
