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
//verification désactiver car on est en local


Route::get('/', function () {
    return view('home');
});
Route::get('/showEvents', 'EventController@show');
Route::post('/createEvent','EventController@create')->name('createEvent');
Route::post('/updateEvent', 'EventController@update')->name('UpdateEvent');
Route::get('/deleteEvent/{id}', 'EventController@delete')->name('deleteEvent');
Route::get('/validateEvent/{id}','EventController@validateEvent')->name('validateEvent');

Route::get('/showRooms', 'RoomController@show');
Route::post('/createRoom', 'RoomController@create')->name('createRoom');
Route::post('/updateRoom','RoomController@update')->name('UpdateRoom');
Route::get('/deleteRoom/{id}', 'RoomController@delete')->name('deleteRoom');

Route::get('/deleteUser/{id}', 'AdminController@delete')->name('deleteUser');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');
Route::get('/admin', 'AdminController@index')->middleware('is_admin');
