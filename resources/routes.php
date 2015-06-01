<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

View::share('prout', 'some data');

View::composer('pages.sample', function($view)
{
    $view->with('someData', 'A data value');
});

/*Route::get('home', function(){

Route::get('home', function(){

    return View::make('welcome');

});*/

Route::get('home', 'PagesController@home');

/*Route::any('page', array('sample-page', function()
{
    $inputs = Input::all();

    $values = Validator::multiple($inputs, array(
        'acteur'    => array('min:5'),
        'director'  => array('email')
    ));

    return View::make('pages.sample', array('inputs' => $values));
}));*/

Route::get('page', ['sample-page', 'uses' => 'PagesController@sample']);

Route::get('page', [['about', 295], 'uses' => 'PagesController@about']);

Route::get('page', [['vision'], 'uses' => 'PagesController@vision']);