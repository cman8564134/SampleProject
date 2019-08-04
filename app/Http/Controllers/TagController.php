<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function submit(Request $request){

        $tag = new Tag();
        $tag->name = $request->input('Name');
        $tag->save();

        return redirect()->route('contact')->with('FormStatus', 'Successfully added new tag!');
    }
}
