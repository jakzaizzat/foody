<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use DB;

class VisualizationController extends Controller
{
    
    //Extract JSON for Show pages
    public function spiderShow($id){
        $recipe = Recipe::find($id);


        $json = DB::table('ingredients')
                    ->select(DB::raw('type as label, SUM(cost) as value'))
                    ->where('recipe_id',$id)
                    ->groupBy('type')
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

        $json = DB::table('ingredients')
                    ->select(DB::raw('name'))
                    ->where('recipe_id', $id)
                    ->get();
        return $json;
    }


}
