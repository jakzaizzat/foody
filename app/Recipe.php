<?php

namespace App;


class Recipe extends Model
{
	public function ingredients(){
		return $this->hasMany(Ingredient::class);
	}
}
