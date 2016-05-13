<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

Route::match(['get', 'post'], 'home', function ($post, $query) {

    return view('pages.index', ['posts' => $query->get_posts()]);

});

Route::any('404', function () {
    return 'Nothing yet';
});
