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
Route::get('/home', function () {
    return view('welcome');
});


Route::group(['prefix' => 'api'], function (){
    Route::get('company', 'CompanyController@index');
    Route::get('category', 'CompanyController@category');
    Route::post('company/inserir', 'CompanyController@store');
    Route::put('company/alterar/{id}', 'CompanyController@update');
    Route::delete('company/deletar/{id}', 'CompanyController@destroy');
});

Auth::routes();