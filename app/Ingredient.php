<?php

namespace App;


class Ingredient extends Model
{
    public function recipe(){
    	return $this->belongsTo(Recipe::class);
    }
}
