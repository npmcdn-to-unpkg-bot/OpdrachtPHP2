<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//standaard laravel routes voor authentication.

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


//gebruikers routes  (alle controllers in Admin map)

Route::group(['prefix' => 'user','middleware' =>'auth' ,'namespace' => 'Admin'],function(){

    //alle routes voor gebruikersdashboard
    Route::get('/myprofile', 'ProfileController@index');

    Route::resource('products',ProductController::class);
});

//gewone routes

