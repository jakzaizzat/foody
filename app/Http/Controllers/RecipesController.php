<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;


class RecipesController extends Controller
{
    public function index(){
    	$recipes = Recipe::latest()->get();

    	return view('recipes.index', compact('recipes'));
    }

    public function show($id){
    	$recipe = Recipe::find($id);

		return view('recipes.show', compact('recipe'));
    }

    public function create(){
    	return view('recipes.create');
    }

    public function store(){
        
        // dd(request()->all());

        //Validate the request
        $this->validate(request(), [
            'name' => 'required|min:1',
            'margin' => 'required'
        ]);

        $recipe = new Recipe;

        Recipe::create([
            'name' => request('name'),
            'quantity' => request('quantity'),
            'margin' => request('margin'),
            'cost' => 100
        ]);

        $last = Recipe::orderBy('created_at', 'desc')->first();

        //return redirect('/recipes');
        return view('recipes.show')->with('recipe', $last);
    }

    public function calcCost($id){

        $recipe = Recipe::find($id);
        $ingredients = $recipe->ingredients;

        $cost = $ingredients->sum('cost');

        $recipe->cost = $cost;
        $recipe->save();
        return redirect()->route('recipeShow',[$id]);
    }
}
