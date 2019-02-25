<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@getHomePage')->name('home');

Route::get('/about', 'PagesController@getAboutPage')->name('about');

Route::get('/contact', 'PagesController@getContactPage')->name('contact');

Route::get('/form-page', 'PagesController@getFormPage')->name('form');

Route::get('/formslist', 'FormsController@getAllForms')->name('formslist');

Route::group(['prefix' => 'foo'], function (){
    Route::post('bar', 'FormsController@Submit')->name('formSubmit');
});