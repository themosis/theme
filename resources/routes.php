<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */



Route::match(['get', 'post'],'home', function () {
    return View::make('child', ['name' => 'Julien']);
});
