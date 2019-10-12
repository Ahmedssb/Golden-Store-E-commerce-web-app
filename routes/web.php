<?php

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

Route::get('/AdminLog','Admin\Main\Main_cont@login')->name('AdminLog');
Route::post('/AdminLog','Admin\Main\Main_cont@login')->name('AdminLog');

// start Admin route 
Route::prefix('Admin')->middleware('auth')->group(function(){ 
    Route::get('/AdminDash','Admin\Main\Main_cont@index')->name('AdminDashboard');
    Route::get('/logout','Admin\Main\Main_cont@logout')->name('logoutt');

}); //end of admin route 
 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
