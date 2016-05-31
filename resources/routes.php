<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

Route::map('GET', '/', function ($request, $response) {
    global $wp_query;
    return view('pages.index', ['posts' => $wp_query->get_posts()]);
});

Route::get('login', function(){

    return 'Login page';

});

Route::get('/people/{name}/{lastname}', function($request, $response, $params)
{
    return 'Hello '.$params['name'].' '.$params['lastname'];
});

/*Route::match(['get', 'post'], 'home', function ($post, $query) {

    return view('pages.index', ['posts' => $query->get_posts()]);

});

Route::any('404', function () {
    return 'Nothing yet';
});*/
