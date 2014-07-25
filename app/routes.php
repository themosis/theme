<?php defined('DS') or die('No direct script access.');

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */
/*Route::get('home', function(){

    tp(get_declared_classes());

    return sprintf('<h1>%s</h1>', "Congratulations! You're running the Themosis framework.");

});*/

Route::get('home', function(){

    return View::make('home');

});

//Route::get('home', 'HomeController@index');

Route::get('front', function($post)
{
    return View::make('pages.front', array(
        'page'  => $post
    ));
});

Route::any('page', array('sample-page', 'uses' => 'SampleController@index'));