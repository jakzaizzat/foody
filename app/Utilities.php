<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Utilities extends Model
{
    public function recipe(){
        return $this->belongsTo(App\Recipe);
    }

    protected $fillable = ['name', 'payment', 'unit_per_day', 'recipe_id', 'cost', 'created_at', 'updated_at'];
}
