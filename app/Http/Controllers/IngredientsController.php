<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Recipe;
use Auth;
use DB;
class IngredientsController extends Controller
{   

    public function add(){
        return view('ingredient.new');
    }

    public function addDB(Request $request){
        $this->validate(request(), [
            'name' => 'required|min:1',
            'price' => 'required',
            'volume' => 'required',
            'unit' => 'required',
        ]);

        $ingredient = new Ingredient;

        Ingredient::create([
            'name' => request('name'),
            'price' => request('price'),
            'volume' => request('volume'),
            'unit' => request('unit'),
            'user_id' => request('user_id')
        ]);

         return redirect('/ingredients')->with('status', 'Added New Ingredient. Have Fun!');
    }

    public function update($id, Request $request){
        
        $ingredient = Ingredient::whereId($id)->firstOrFail();

        $ingredient->name = $request->get('name');
        $ingredient->price = $request->get('price');
        $ingredient->volume = $request->get('volume');
        $ingredient->unit = $request->get('unit');

        $ingredient->save();

        return redirect('/ingredients')->with('status', 'The ingredient #'.$id.' has been updated!');
    }

    public function index($id){
        
        $ingredients = Recipe::find($id)->ingredients()->get();
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
            'volume' => 'required',
            'recipe_id' => 'required',
            'ingredient_name' => 'required'
        ]);

         $id = Auth::user()->id;

        //Get Volume
        $volume = request('volume');

        //Get Recipe ID
        $recipe_id = request('recipe_id');
        $recipe = Recipe::find($recipe_id);

        //Get Ingredient ID based on string
        $ing_name = request('ingredient_name');

        $ingredient_table = DB::table('ingredients')
                            ->select(DB::raw('id'))
                            ->where('user_id',$id)
                            ->where('name',$ing_name)
                            ->get();

        $ingredient_id = $ingredient_table[0]->id;

        $ingredient = Ingredient::find($ingredient_id);



        $recipe->ingredients()->save($ingredient, ['portion' => $volume]);

        //$route = $request->input('route');

        //return redirect()->route($route, [$id]);
        return redirect('recipe/'.$recipe_id.'/items')->with('status', 'Added '.$ing_name.'.');
    }


    public function listIng(){

        $id = Auth::user()->id;

        $ingredients = Ingredient::where('user_id', $id)->get();

        return view('ingredient.list', compact('ingredients'));
    }


    public function edit($id){
         $ingredient = Ingredient::whereId($id)->firstOrFail();

        return view('ingredient.edit', compact('ingredient'));
    }

    

    public function destroy($id){
        $ingredient = Ingredient::whereId($id)->firstOrFail();
        $ingredient->delete();
        return redirect('recipes')->with('status', 'The ingredient #'.$id.' has been deleted!');
    }

    public function deleteList($id){
        $ingredient = Ingredient::whereId($id)->firstOrFail();

        $recipe_id = request('recipe_id');

        DB::table('ingredient_recipe')
            ->where('ingredient_id', $id)
            ->where('recipe_id', $recipe_id)
            ->delete();

        //return redirect('recipeMaterial')->with('status', 'The ingredient #'.$id.' has been deleted!');
        return redirect('recipe/'.$recipe_id.'/items')->with('status', 'The ingredient #'.$id.' has been deleted!');
    }

}
