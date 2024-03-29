<?php

namespace App\Http\Controllers;

use App\Form;
use App\Tag;
use Illuminate\Http\Request;
use App\Account;
use Carbon\Carbon;


class FormsController extends Controller
{
    public function submit(Request $request){

        $this->validateForm($request);
        $form = new Form();
        $form->saveForm($request);

        return redirect()->route('contact')->with('FormStatus', 'Successfully submitted form!');
    }

    public function getAllForms(){

        $form = new Form();
        return $form->getAllForms();
    }

    public function getSpecificForm(Request $request){

        $this->validateForm($request);
        $form = new Form();
        $specificForm = $form->getSpecificForm($request);
        if(count($specificForm)>0){
            $tag = Tag::all();
            return view('formEdit')->with('SpecificForm', $specificForm )->with('tags',$tag);
        }else {
            return view('formSearch')->withErrors('No such email exist!');
        }
    }

    public function editForm(Request $request){
        $form = Form::find($request->input('EditFormID'));
        switch ($request->input('action')) {
            case 'Edit':
                $form->email = $request->input('EditFormEmail');
                $form->save();
                //Many to many relationship linking through middle table
                //laravel auto check which to detach and attach
                $form->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));
//                removes all reference in middle table
//                $form->tags()->detach();
//                Adds all reference according to the array given
//                $form->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
                break;

            case 'SoftDelete':
                $form->delete();
                break;
            case 'HardDelete':
                $form->forceDelete();
                break;
        }


        return $this->getAllForms();
    }

    private function validateForm(Request $request){

        $this->validate($request, [
            'email' => 'required | email',
            ]);
        if (!str_contains(route('formSearch'), $request->path())) {
            $this->validate($request, ['password' => 'required']);
        }
    }

    public function addRandomAccount(Request $request){

        $form = Form::find($request->input('EditFormID'));
        $acc = new Account();
        $acc->name = "Name:" . $request->input('EditFormEmail');
        $acc->DateOfBirth = Carbon::now();
        $form->accounts()->save($acc);
        return redirect()->route('formslist', []);

    }

    public function getAccount(Request $request){
        $form = Form::find($request->input('EditFormID'));
        return $form -> accounts();
    }




}
