<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use DB;
use Auth;

class VisualizationController extends Controller
{
    
    //Extract JSON for Show pages
    public function spiderShow($id){
        $recipe = Recipe::find($id);

        $json = DB::table('ingredient_recipe')
                    ->join('ingredients', 'ingredient_recipe.ingredient_id', '=', 'ingredients.id')
                    ->select('ingredients.name', 'ingredient_recipe.portion', 'ingredients.volume', 'ingredients.price')
                    ->where('ingredient_recipe.recipe_id', $id)
                    ->get();



        return $json;
    }


    public function timeline($id){
    	$recipe = Recipe::find($id);


        $json = DB::table('ingredients')
        			->select(DB::raw('price,renew'))
        			->where('recipe_id', $id)
        			->where('type', 'production')
        			->get();

        return $json;
    }

    public function listIng($id){

        $id = Auth::user()->id;

        $json = DB::table('ingredients')
                    ->select(DB::raw('name,unit'))
                    ->where('user_id', $id)
                    ->get();
        return $json;
    }


}
