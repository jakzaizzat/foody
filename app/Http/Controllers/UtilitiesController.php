<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilities;
use App\Recipe;

class UtilitiesController extends Controller
{
    public function listUtilities($id){
        $utilities = Utilities::where('recipe_id', $id)->get();
        $recipe = Recipe::find($id);
        return view('utilities.utilities', compact('recipe', 'utilities'));
    }

    public function store(){
        //dd(request()->all());

        $this->validate(request(), [
            'utility_name' => 'required|min:1',
            'payment' => 'required',
            'unit_per_day' => 'required',
            'recipe_id' => 'required'
        ]);

        $utility = new Utilities;

        //Calculate cost each unit
        $payment = request('payment');
        $unit_per_day = request('unit_per_day');
        $recipe_id = request('recipe_id');

        $cost = $payment / 30 / $unit_per_day;
        $cost = number_format($cost, 2, '.', ',');

        //Init
        $utility::create([
            'name' => request('utility_name'),
            'payment' => $payment,
            'unit_per_day' => $unit_per_day,
            'recipe_id' => request('recipe_id'),
            'cost' => $cost
        ]);

        //Get Recipe ID and Related Utilites
        $recipe = Recipe::find($recipe_id);
        $utilities = Utilities::where('recipe_id', $recipe_id)->get();

        return redirect()->route('utilities', ['id' => $recipe])->with('status', 'Done add your utilities cost');

    }

    public function deleteList($id){
        $utility = Utilities::whereId($id)->firstOrFail();

        $recipe_id = request('recipe_id');

        $utility->delete();

        //return redirect('recipeMaterial')->with('status', 'The ingredient #'.$id.' has been deleted!');
        return redirect('recipe/'.$recipe_id.'/utilities')->with('status', 'The Utilities #'.$id.' has been deleted!');
    }

}
