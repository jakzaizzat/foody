<?php

namespace App;


class Ingredient extends Model
{
    public function recipes(){
    	return $this->belongsToMany('App\Recipe')->withPivot('portion');
    }
}
