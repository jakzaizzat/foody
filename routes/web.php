<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/stat', 'HomeController@stat');

//Recipe
Route::get('/recipes', 'RecipesController@index')->name('recipes');

Route::get('/recipe/{id}', 'RecipesController@show')->name('recipeShow');
Route::get('/recipe/{id}/edit', 'RecipesController@edit');
Route::post('/recipe/{id}/edit', 'RecipesController@update');
Route::post('/recipe/{id}/delete', 'RecipesController@destroy');

Route::get('/recipes/add', 'RecipesController@create');
Route::post('/recipes/add', 'RecipesController@store');

Route::get('/recipe/{id}/calculator', 'VisualizationController@calculator');

//Ingredient
Route::get('/ingredients', 'IngredientsController@listIng');
Route::get('/ingredient/new', 'IngredientsController@add');
Route::post('/ingredient/new', 'IngredientsController@addDB');

Route::post('/ingredient/add', 'IngredientsController@store');
Route::get('/ingredient/{id}/edit', 'IngredientsController@edit');
Route::post('/ingredient/{id}/edit', 'IngredientsController@update');
Route::post('/ingredient/{id}/delete', 'IngredientsController@destroy');

Route::post('/ingredient/{id}/deleteThis', 'IngredientsController@deleteList');

Route::get('/recipe/{id}/items', 'IngredientsController@index')->name('recipeMaterial');
Route::get('/recipe/{id}/production', 'IngredientsController@production')->name('recipeProduction');
Route::get('/recipe/{id}/nonproduction', 'IngredientsController@nonproduction')->name('recipeNonProduction');

//Labor
Route::get('/recipe/{id}/labor', 'LaborController@listLabor')->name('labor');
Route::post('/recipe/{id}/labor/add', 'LaborController@store');
Route::post('/labor/{id}/deleteThis', 'LaborController@deleteList');

//Utilities
Route::get('/recipe/{id}/utilities', 'UtilitiesController@listUtilities')->name('utilities');
Route::post('/recipe/{id}/utilities/add', 'UtilitiesController@store');
Route::post('/utilities/{id}/deleteThis', 'UtilitiesController@deleteList');


//Calc Cost
Route::get('/calcCost/{id}', 'RecipesController@calcCost')->name('calcCost');


//Rest API
Route::get('/ingredient/{id}/list', 'VisualizationController@listIng');


//Single Visualization 
Route::get('/recipe/{id}/analysis', 'RecipesController@viewVisualization');

//Fetch Data
Route::get('/spiderjson/{id}', 'VisualizationController@spiderShow');
Route::get('/laborcost/{id}', 'VisualizationController@calcLabor');
Route::get('/utilitycost/{id}', 'VisualizationController@calcUtility');
Route::get('/timelinejson/{id}', 'VisualizationController@timeline');


//Playground
Route::get('/rat', 'RecipesController@rat');

//AUthentication4
Auth::routes();

Route::get('/home', 'HomeController@index');


//Vue.JS
Route::get('/vuejs', function(){
	return view('vue');
});
