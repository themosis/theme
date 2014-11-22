<?php defined('DS') or die('No direct script access.');

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

View::share('prout', 'some data');

Route::get('home', function(){

    return View::make('home');

});

/*Route::get('home', function(){

    return View::make('home');

});*/

//Route::get('home', 'HomeController@index');

Route::get('front', function($post)
{
    return View::make('pages.front', array(
        'page'  => $post
    ));
});

Route::get('page', array(array('welcome', 101), function($post){

    return "Welcome everyone to the Themosis Magic Land!";

}));

Route::any('page', array('sample-page', 'uses' => 'SampleController@index'));

/*Route::get('404', function(){

    return "404 - Page not found";

});*/