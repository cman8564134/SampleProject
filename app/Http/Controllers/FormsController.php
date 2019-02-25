<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;


class FormsController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $form = new Form([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);
        $form->save();
        return redirect()->route('contact')->with('FormStatus', 'Successfully submitted form!');
    }

    public function getAllForms()
    {
        $form = new Form();
        return $form->getAllForms();
    }
}
