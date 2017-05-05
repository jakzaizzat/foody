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


        $json = DB::table('ingredients')
                                        ->select(DB::raw('type as label, SUM(cost) as value'))
                                        ->where('recipe_id',$id)
                                        ->groupBy('type')
                                        ->get();


		return view('recipes.show', compact('recipe','json'));
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
            'margin' => 'required',
            'itemPerDay' => 'required'
        ]);

        $recipe = new Recipe;

        Recipe::create([
            'name' => request('name'),
            'quantity' => request('quantity'),
            'margin' => request('margin'),
            'itemPerDay' => request('itemPerDay'),
            'cost' => 0
        ]);

        $id = Recipe::orderBy('created_at', 'desc')->first()->id;

        //return view('recipes.show')->with('recipe', $last);
        return redirect()->route('recipeShow',[$id]);
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
