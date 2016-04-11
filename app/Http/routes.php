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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/imovel/{id}', 'HomeController@viewImovel');


    // Rotas da autenticacao
    Route::get('/login', 'Auth\AuthController@getLogin');
    Route::post('/auth', 'Auth\AuthController@postLogin');
    Route::get('/logout', 'Auth\AuthController@logout');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/imovel/novo', 'AdminController@createForm');
    Route::get('/admin/imovel/{id}', 'AdminController@updateForm');
    Route::get('/admin/imovel/excluir/{id}', 'AdminController@delete');
});

