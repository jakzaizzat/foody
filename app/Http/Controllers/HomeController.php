<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function stat(){
        $totalRecipe = Recipe::all()->count();
        $totalIng = Ingredient::all()->count();
        $totalUser = User::all()->count();

        return view('stat', compact('totalRecipe','totalIng', 'totalUser'));
    }
}
