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
/*What if your app has pre-registered users, or they are created by administrator, and there’s no public registration? then put Auth::routes(['register' => false]); instead of Auth::routes();*/
//Auth::routes(['register' => false]);
Auth::routes();
Route::resource('home', 'HomeController');
//Route::resource('teams', 'TeamController');
Route::get('index', 'Auth\RegisterController@index')->name('index');
Route::post('register', 'Auth\RegisterController@create')->name('auth/create');


Route::get('teams', 'TeamController@index')->name('index');
Route::get('teams/create', 'TeamController@create')->name('teams/create');
Route::post('teams/store', 'TeamController@store')->name('teams/store');
Route::get('teams/edit/{id}', 'TeamController@edit')->name('teams/edit');
Route::post('teams/update/{id}', 'TeamController@update')->name('teams/update');
Route::post('teams/destroy/{id}', 'TeamController@destroy')->name('teams/destroy');
Route::get('avatars/{name}', 'TeamController@load');

Route::resource('expenses', 'ExpenseController');
Route::get('expenses', 'ExpenseController@index')->name('index');
Route::get('expenses/create', 'ExpenseController@create')->name('expenses/create');
Route::post('expenses/store', 'ExpenseController@store')->name('expenses/store');
Route::get('expenses/edit/{id}', 'ExpenseController@edit')->name('expenses/edit');
Route::post('expenses/update/{id}', 'ExpenseController@update')->name('expenses/update');
Route::post('expenses/destroy/{id}', 'ExpenseController@destroy')->name('expenses/destroy');
//Route::get('/home', 'HomeController@index')->name('home');
