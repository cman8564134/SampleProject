<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['Name'];

    public function forms(){
        return $this->belongsToMany('App\Form')->withTimestamps();
    }

    //mutator. Automatically modify value before saving into db
    public function setNameAttribute($value){
        $this->attributes['Name'] = strtoupper($value);
    }

    //accessor. Automatically modify value when reading from db
    public function getNameAttribute($value){
        return strtolower($value);
    }
}
