<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => '/v1'], function () {
    Route::group(['prefix' => 'movie'], function () {
        Route::get('/{movie}', 'RentalController@getMovie')->name('get-movie');
        Route::get('/{movie}/order', 'RentalController@getMovieOrder')->name('get-movie-order');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::post('/', 'RentalController@createOrder')->name('create-order');
        Route::get('/{order}', 'RentalController@getOrder')->name('get-order');
        Route::get('/{order}/movies', 'RentalController@getOrderMovies')->name('get-order-movies');
    });
});
