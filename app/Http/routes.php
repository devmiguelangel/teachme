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

// Authentication routes
Route::get('auth/login', [
    'as'   => 'auth.get.login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
    'as'   => 'auth.post.login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
    'as'   => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/', [
    'as'   => 'ticket.latest',
    'uses' => 'TicketController@latest'
]);

Route::get('/popular', [
    'as'   => 'ticket.popular',
    'uses' => 'TicketController@popular'
]);

Route::get('/pending', [
    'as'   => 'ticket.open',
    'uses' => 'TicketController@open'
]);

Route::get('/tutorials', [
    'as'   => 'ticket.closed',
    'uses' => 'TicketController@closed'
]);

Route::get('/details/{id}', [
    'as'   => 'ticket.details',
    'uses' => 'TicketController@details'
]);

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => 'auth'], function() {
    Route::get('/ticket/request', [
        'as'   => 'ticket.create',
        'uses' => 'TicketController@create'
    ]);
});
