<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHomePage(){
        return view('welcome');
    }

    public function getContactPage(){
        return view('contact');
    }

    public function getFormPage(){
        return view('form');
    }
    public function getAboutPage(){
        return view('about');
    }
    public function getSearchFormPage(){
        return view('formSearch');
    }

    public function getTagPage(){
        return view('tag');
    }
}
