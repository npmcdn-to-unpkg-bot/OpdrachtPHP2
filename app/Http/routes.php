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

Route::get('/',['uses' => 'ProductController@index' ]);

Route::auth();

Route::get('/home', 'HomeController@index');


//gebruikers routes  (alle controllers in Admin map)

Route::group(['prefix' => 'user','middleware' =>'auth' ,'namespace' => 'Admin'],function(){

    //alle routes voor gebruikersdashboard
    Route::get('/myprofile', 'ProfileController@index');

    Route::resource('products',ProductController::class);

    //favorite jqueryroute
    Route::post('favorite/addfavorite', array('as' => 'favorite.addfavorite', 'uses' => 'FavoriteController@addfavorite'));
    //route voor index
    Route::resource('favorites',FavoriteController::class);
});

//gewone routes
Route::get('products/{id}',['as' => 'products.detail', 'uses' => 'ProductController@show' ]);

Route::get('user/{id}',['as' => 'profile.show', 'uses' => 'UserController@show' ]);


//messaging system
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create/{to_user}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
//delete thread
    Route::get('delete/{id}', ['as' => 'messages.delete', 'uses' => 'MessagesController@destroy']);
});