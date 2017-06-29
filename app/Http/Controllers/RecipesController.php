<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use App\Recipe;
use App\Labor;
use App\Utilities;
use DB;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function index(){

        $id = Auth::user()->id;

    	$recipes = Recipe::where('user_id', $id)->get();

        $totalRecipe = Recipe::where('user_id', $id)->get()->count();
        $totalIng = Ingredient::where('user_id', $id)->get()->count();

        //Labor
        $labors = Labor::all();

        //Utilities
        $utilities = Utilities::all();

    	return view('recipes.index', compact('recipes', 'labors', 'utilities', 'totalRecipe', 'totalIng'));
    }

    public function show($id){
    	$recipe = Recipe::find($id);

        $total = 0;

        //Ingredient
        foreach ($recipe->ingredients as $ingredient){
            $total += $ingredient->pivot->portion/$ingredient->volume * $ingredient->price ;
        }

        //Labor
        $labors = Labor::where('recipe_id', $id)->get();
        foreach ($labors as $labor){
            $total += $labor->cost;
        }

        //Utilities
        $utilities = Utilities::where('recipe_id', $id)->get();
        foreach ($utilities as $utility){
            $total += $utility->cost;
        }




        return view('recipes.show', compact('recipe','total', 'labors', 'utilities'));
        //return $json;
    }

    public function create(){
    	return view('recipes.create');
    }

    public function store(){
        
        // dd(request()->all());

        //Validate the request
        $this->validate(request(), [
            'name' => 'required|min:1',
            'quantity' => 'required',
            'yield_type' => 'required',
            'user_id' => 'required'
        ]);

        $recipe = new Recipe;

        Recipe::create([
            'name' => request('name'),
            'quantity' => request('quantity'),
            'yield_type' => request('yield_type'),
            'user_id' => request('user_id')
        ]);

        $id = Recipe::orderBy('created_at', 'desc')->first()->id;

        //return view('recipes.show')->with('recipe', $last);
        return redirect()->route('recipeShow',[$id]);

    }


    public function edit($id){
        $recipe = Recipe::whereId($id)->firstOrFail();

        return view('recipes.edit', compact('recipe'));

    }


    public function update($id, Request $request){
        
        $recipe = Recipe::whereId($id)->firstOrFail();

        $recipe->name = $request->get('name');
        $recipe->quantity = $request->get('quantity');
        $recipe->yield_type = $request->get('yield_type');
        $recipe->user_id = $request->get('user_id');


        $recipe->save();

        return redirect('recipes')->with('status', 'The recipe #'.$id.' has been updated!');
    }


    public function destroy($id){
        $recipe = Recipe::whereId($id)->firstOrFail();
        $recipe->delete();

        //Delete related ingredient from ingredient_recipe
        DB::table('ingredient_recipe')->where('recipe_id', $id)->delete();
        DB::table('labors')->where('recipe_id', $id)->delete();
        DB::table('utilities')->where('recipe_id', $id)->delete();


        return redirect('recipes')->with('status', 'The recipe #'.$id.' has been deleted!');
    }

    public function calcCost($id){

        $recipe = Recipe::find($id);
        $ingredients = $recipe->ingredients;

        $ingredients = $ingredients->where('type', '!=', 'production');
        $ingredients = $ingredients->where('type', '!=', 'nonproduction');

        $cost = $ingredients->sum('cost');

        $recipe->cost = $cost;
        $recipe->save();
        return redirect()->route('recipeShow',[$id]);
    }

   
    public function viewVisualization($id){
         $recipe = Recipe::find($id);

         return view('recipes.analysis', compact('recipe')); 
    }


    public function rat(){
        return view('rat');
    }
}
