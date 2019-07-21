<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Form extends Model
{
    use SoftDeletes;
    protected $fillable = ['email','password','description'];
    //
    public function getAllForms()
    {
        $forms = Form::all(['id', 'email','password']);
        return view('FormsList')->with('Forms', $forms);
    }

    public function saveForm(Request $request)
    {
        $form = new Form([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);
        $form->save();
    }

    public function getSpecificForm(Request $request){

        return Form::where('email','LIKE','%'.$request->input('email').'%')->get();
    }
}
