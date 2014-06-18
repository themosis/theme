<?php defined('DS') or die('No direct script access.');

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */
Route::is('home', function(){

    return View::make('pages.accueil')->with(array(
        'name'  => 'Julien'
    ));

});

Route::only('page', 'sample-page', function(){

    global $post;

    return View::make('pages.sample', array(
        'page'  => $post
    ));

});