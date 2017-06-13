<?php

namespace App;


class Recipe extends Model
{
	public function ingredients(){
		return $this->belongsToMany('App\Ingredient')->withPivot('portion');
	}

	public function labors(){
	    return $this->belongsToMany('App\Labor');
    }

    public function utilites(){
	    return $this->hasMany('App\Utilities');
    }
}
