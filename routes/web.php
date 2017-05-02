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

//Recipe
Route::get('/recipes', 'RecipesController@index')->name('recipes');
Route::get('/recipe/{id}', 'RecipesController@show')->name('recipeShow');
Route::get('/recipes/add', 'RecipesController@create');
Route::post('/recipes/add', 'RecipesController@store');

//Ingredient
Route::post('/ingredient/add', 'IngredientsController@store');
Route::get('/recipe/{id}/items', 'IngredientsController@index')->name('recipeMaterial');
Route::get('/recipe/{id}/labor', 'IngredientsController@labor')->name('recipeLabor');
Route::get('/recipe/{id}/production', 'IngredientsController@production')->name('recipeProduction');
Route::get('/recipe/{id}/nonproduction', 'IngredientsController@nonproduction')->name('recipeNonProduction');

//Calc Cost
Route::get('/calcCost/{id}', 'RecipesController@calcCost')->name('calcCost');


//Playground
Route::get('/spiderjson/{id}', 'RecipesController@spiderShow');