<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Labor;
use App\Recipe;

class LaborController extends Controller
{

    public function listLabor($id){
        $labors = Labor::where('recipe_id', $id)->get();
        $recipe = Recipe::find($id);

        return view('labor.labor',compact('labors', 'recipe'));
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store()
    {
        //dd(request()->all());

        $this->validate(request(), [
            'labor_name' => 'required|min:1',
            'salary' => 'required',
            'time_based' => 'required',
            'recipe_id' => 'required',
            'time_consume' => 'required'
        ]);

        $labor = new Labor;

        $time_based = request('time_based');
        $time_consume = request('time_consume');
        $salary = request('salary');
        $recipe_id = request('recipe_id');

        //Calculate Cost
        if ($time_based == "Monthly"){
            $time = 30 * 24 * 60;
        }elseif ($time_based == "Daily"){
            $time = 24 * 60;
        }elseif ($time_based == "Hourly"){
            $time = 60;
        }else{
            $time = 999999999999999;
        }

        $cost =   $time_consume / $time  * $salary ;
        $cost =  number_format($cost, 2, '.', ',');

        $labor::create([
            'name' => request('labor_name'),
            'salary' => $salary,
            'time_based' => $time_based,
            'recipe_id' => request('recipe_id'),
            'time_consume' => $time_consume,
            'cost' => $cost
        ]);

//        $labor->save();


        //Get Recipe ID and Related Labors
        $recipe = Recipe::find($recipe_id);
        $labors = Labor::where('recipe_id', $recipe_id)->get();


        //return view('labor.labor', compact('recipe', 'labors'))->with('status', 'Done add your labor cost');
        return redirect()->route('labor', ['id' => $recipe])->with('status', 'Done add your labor cost');

    }

    public function deleteList($id){
        $labor = Labor::whereId($id)->firstOrFail();

        $recipe_id = request('recipe_id');

        $labor->delete();

        //return redirect('recipeMaterial')->with('status', 'The ingredient #'.$id.' has been deleted!');
        return redirect('recipe/'.$recipe_id.'/labor')->with('status', 'The Labor #'.$id.' has been deleted!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
