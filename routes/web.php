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

Route::get('/recipes', 'RecipesController@index')->name('recipes');
Route::get('/recipe/{id}', 'RecipesController@show')->name('recipeShow');
Route::get('/recipes/add', 'RecipesController@create');
Route::post('/recipes/add', 'RecipesController@store');

Route::post('/ingredient/add', 'IngredientsController@store');

//Calc Cost
Route::get('/calcCost/{id}', 'RecipesController@calcCost')->name('calcCost');
