<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Recipe;

class IngredientsController extends Controller
{   
    public function index($id){
        
        $ingredients = Recipe::find($id)->ingredients->where('type', 'material');
        $recipe = Recipe::find($id);

        return view('ingredient.index', compact('ingredients', 'recipe'));
    }

    public function labor($id){

        $ingredients = Recipe::find($id)->ingredients->where('type', 'labor');
        $recipe = Recipe::find($id);

        return view('ingredient.labor', compact('ingredients', 'recipe'));
    }

    public function production($id){

        $ingredients = Recipe::find($id)->ingredients->where('type', 'production');
        $recipe = Recipe::find($id);

        return view('ingredient.production', compact('ingredients', 'recipe'));
    }

    public function nonproduction($id){
        
        $ingredients = Recipe::find($id)->ingredients->where('type', 'nonproduction');
        $recipe = Recipe::find($id);

        return view('ingredient.nonproduction', compact('ingredients', 'recipe'));
    }

    public function store(Request $request){
        
        //dd(request()->all());

        //Validate the request
        $this->validate(request(), [
            'name' => 'required|min:1',
            'price' => 'required',
            'usage' => 'required',
            'recipe_id' => 'required',
            'renew' => 'required'
        ]);

        $ingredient = new Ingredient;

        $price = $request->input('price');
        $usage = $request->input('usage');
        $cost = $price/$usage;

        $renewInday = $request->input('renew');

        Ingredient::create([
            'name' => request('name'),
            'price' => request('price'),
            'usage' => request('usage'),
            'cost' => $cost,
            'recipe_id' => request('recipe_id'),
            'type' => request('type'),
            'renew' => $renewInday
        ]);

        $id = $request->input('recipe_id');
        $recipe = Recipe::find($id);

        //return redirect('/recipes');
        //return view('recipes.show')->with('recipe', $recipe);
        $route = $request->input('route');

        return redirect()->route($route, [$id]);
    }
}
