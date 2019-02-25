<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Form extends Model
{
    protected $fillable = ['email','password','description'];
    //
    public function getAllForms()
    {
        $forms = Form::all(['id', 'email','password']);
        return view('FormsList')->with('Forms', $forms);
    }

    public function saveForm(Request $request)
    {

    }
}
