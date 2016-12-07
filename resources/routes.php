<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */
Route::match(['get', 'post'], 'front', function () {
    $all = Themosis\Theme\Facades\Post::all();

    $users = [];//DB::table('users')->get();

    return view('hello', ['articles' => $all, 'users' => $users]);
});

//Route::get('singular', [[CARS, BOOKS], 'uses' => 'Themosis\Theme\Controllers\Example@books']);

Route::match(['get', 'post'], 'singular', ['post', function () {
    return 'Single post content';
}]);

Route::match(['get', 'post'], 'template', ['two-columns', function ($post) {
    return "Any post with the two-columns template associated. Post: {$post->post_title}";
}]);

Route::match(['get', 'post'], 'page', function () {
    return 'Generic page';
});

Route::get('singular', 'Themosis\Theme\Controllers\Example@singular');

/*Route::match(['get', 'post'], 'singular', ['jl_books', function () {
    return 'Single book content';
}]);*/

/*Route::match(['get', 'post'], 'singular', ['jl_cars', function () {
    return 'Single car content';
}]);*/

Route::match(['get', 'post'], 'page', ['sample-page', function () {
    return "Sample page content";
}]);

Route::get('user/{name}', function($name){
    return 'Hi user '.$name;
});

Route::get('profile/{name}', function ($name) {
    return "Hello {$name}";
});

Route::match(['get', 'post'], 'home', ['uses' => 'Themosis\Theme\Controllers\Example@index']);

Route::get('something', function()
{
    return 'Hello something';
});

/*Route::any('singular', ['jl_cars', function() {
    return view('cars.single');
}]);*/

/*Route::any('singular', ['jl_books', function () {
    return 'The book';
}]);*/

Route::any('404', 'Themosis\Theme\Controllers\Example@notfound');
