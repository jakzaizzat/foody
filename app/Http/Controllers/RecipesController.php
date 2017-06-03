<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use DB;

class RecipesController extends Controller
{
    public function index(){
    	$recipes = Recipe::latest()->get();

    	return view('recipes.index', compact('recipes'));
    }

    public function show($id){
    	$recipe = Recipe::find($id);

        $total = 0;

        foreach ($recipe->ingredients as $ingredient){
            $total += $ingredient->pivot->portion/$ingredient->volume * $ingredient->price ;
        }
		
        return view('recipes.show', compact('recipe','total'));
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
        $recipe->margin = $request->get('margin');
        $recipe->itemPerDay = $request->get('itemPerDay');
        
        //Recalculate the cost
        $ingredients = $recipe->ingredients;

        $ingredients = $ingredients->where('type', '!=', 'nonproduction');

        $cost = $ingredients->sum('cost');

        $recipe->cost = $cost;


        $recipe->save();

        return redirect('recipes')->with('status', 'The recipe #'.$id.' has been updated!');
    }


    public function destroy($id){
        $recipe = Recipe::whereId($id)->firstOrFail();
        $recipe->delete();
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
