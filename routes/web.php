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
    Route::get('/Settings','Admin\Main\Main_cont@settings')->name('Settings');

    Route::prefix('Category')->group(function(){

        Route::get('Index','Category_cont@index')->name('Category.Index');
        Route::get('Add','Category_cont@add')->name('Category.Add');
        Route::post('Add','Category_cont@add')->name('Category.Add');
        Route::get('Update/{id}','Category_cont@update')->name('Category.Update');
        Route::post('Update/{id}','Category_cont@update')->name('Category.Update');
        Route::get('Delete/{id}','Category_cont@delete')->name('Category.Delete');
        Route::post('Delete/{id}','Category_cont@delete')->name('Category.Delete');


 });

}); //end of admin route 
 
Route::get('/logout','Admin\Main\Main_cont@logout')->name('logoutt');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
