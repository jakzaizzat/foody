<?php

namespace App;


class Recipe extends Model
{
	public function ingredients(){
		return $this->belongsToMany('App\Ingredient')->withPivot('portion');
	}
}
