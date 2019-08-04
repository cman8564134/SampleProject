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
        //paginate is used for pagination with the parameter for the values per page
        $forms = Form::with('accounts')->paginate(2);
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
//        get forms with all their linked accounts. this way we can use one query to get values from both tables.
//        return Form::where('email','LIKE','%'.$request->input('email').'%')->with('accounts')->get();
    }

    public function accounts(){
        //one to many relationship
        return $this->hasMany('App\Account');
//        foreign key default is xxx_id but can change it with.
//        return $this->hasMany('App\Account','account_id');
    }

    public function tags(){
        //many to many relationship
        return $this->belongsToMany('App\Tag')->withTimestamps();
//        //this is the same as this line because we're only using default values
//        return $this->belongsToMany('App\Tag','form_tag','form_id','tag_id');
    }
}
