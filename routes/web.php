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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/locales', 'LocaleController@index');
Route::get('/locale/create', 'LocaleController@create');
Route::get('/locale/show/{id}', 'LocaleController@show');
Route::get('/locale/edit/{id}', 'LocaleController@edit');
Route::post('/locale/store', 'LocaleController@store');
Route::post('/locale/destroy/{id}', 'LocaleController@destroy');
Route::post('/locale/update/{id}', 'LocaleController@update');


Route::get('/areas', 'AreaController@index');
Route::get('/area/create', 'AreaController@create');
Route::get('/area/show/{id}', 'AreaController@show');
Route::get('/area/edit/{id}', 'AreaController@edit');
Route::post('/area/store', 'AreaController@store');
Route::post('/area/destroy/{id}', 'AreaController@destroy');
Route::post('/area/update/{id}', 'AreaController@update');


Route::get('/types', 'TypeController@index');
Route::get('/type/create', 'TypeController@create');
Route::get('/type/show/{id}', 'TypeController@show');
Route::get('/type/edit/{id}', 'TypeController@edit');
Route::post('/type/store', 'TypeController@store');
Route::post('/type/destroy/{id}', 'TypeController@destroy');
Route::post('/type/update/{id}', 'TypeController@update');

//fazendo
Route::get('/companies', 'CompanyController@index');
Route::get('/company/create', 'CompanyController@create');
Route::get('/company/show/{id}', 'CompanyController@show');
Route::get('/company/edit/{id}', 'CompanyController@edit');
Route::post('/company/store', 'CompanyController@store');
Route::post('/company/destroy/{id}', 'CompanyController@destroy');
Route::post('/company/update/{id}', 'CompanyController@update');


Route::post('/companies', 'CompanyController@searchByName');
