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

Route::get('/formssearch', 'PagesController@getSearchFormPage')->name('formssearch');

Route::get('/tag', 'PagesController@getTagPage')->name('tagCreate');

Route::group(['prefix' => 'form'], function (){
    Route::post('submit', 'FormsController@Submit')->name('formSubmit');

    Route::post('search','FormsController@getSpecificForm')->name("formSearch");

    Route::post('edit','FormsController@editForm')->name("formEdit");

    Route::post('addRandomAccount','FormsController@addRandomAccount')->name("formAddRandomAccount");
});

Route::group(['prefix' => 'tag'], function () {
    Route::post('create', 'TagController@submit')->name('createTag');
});