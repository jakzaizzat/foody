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
Route::get('/recipe/{id}/edit', 'RecipesController@edit');
Route::post('/recipe/{id}/edit', 'RecipesController@update');
Route::post('/recipe/{id}/delete', 'RecipesController@destroy');

Route::get('/recipes/add', 'RecipesController@create');
Route::post('/recipes/add', 'RecipesController@store');

//Ingredient
Route::post('/ingredient/add', 'IngredientsController@store');
Route::get('/ingredient/{id}/edit', 'IngredientsController@edit');
Route::post('/ingredient/{id}/edit', 'IngredientsController@update');
Route::post('/ingredient/{id}/delete', 'IngredientsController@destroy');

Route::get('/recipe/{id}/items', 'IngredientsController@index')->name('recipeMaterial');
Route::get('/recipe/{id}/labor', 'IngredientsController@labor')->name('recipeLabor');
Route::get('/recipe/{id}/production', 'IngredientsController@production')->name('recipeProduction');
Route::get('/recipe/{id}/nonproduction', 'IngredientsController@nonproduction')->name('recipeNonProduction');

//Calc Cost
Route::get('/calcCost/{id}', 'RecipesController@calcCost')->name('calcCost');

//Single Visualization 
Route::get('/recipe/{id}/analysis', 'RecipesController@viewVisualization');

//Fetch Data
Route::get('/spiderjson/{id}', 'VisualizationController@spiderShow');
Route::get('/timelinejson/{id}', 'VisualizationController@timeline');

//Playground
Route::get('/rat', 'RecipesController@rat');

//AUthentication4
Auth::routes();

Route::get('/home', 'HomeController@index');
