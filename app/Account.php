<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Account extends Model
{
    //
    protected $fillable = ['Name','DateOfBirth'];

    public function form(){
        return $this->belongsTo('App\Form');
    }
}
