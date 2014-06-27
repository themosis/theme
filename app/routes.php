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

    return 'This is the home page';

});*/

//Route::get('home', array('as' => 'accueil', 'uses' => 'ProutController@advanced'));

Route::get('home', 'ProutController@advanced');

/*Route::get('home', function(){

    return View::make('pages.accueil')->with(array('name' => 'Julien'));

});*/

/*Route::get('home', function(){

    return View::make('home', array('name' => 'Themosis Name'));

});*/

/*Route::post('home', function(){

    $question = Input::get('question');

    return View::make('pages.answer', array('question' => $question));

});

Route::get('home', function(){

    return View::make('pages.ask');

});*/

/*// This route will only trigger if using https scheme.
Route::get('home', array('https', function(){

    return "Page is running over HTTPS.";

}));

Route::get('home', array('http', function(){

    return "Page is running over HTTP.";

}));*/

/*Route::get('page', array(function(){

    global $post;

    return View::make('pages.sample', array(
        'page'  => $post
    ));

}));*/

Route::get('template', array('params' => array('custom-template'), function(){

    return View::make('pages.ask');

}));

Route::post('template', array('params' => 'custom-template', function(){

    $question = Input::get('question');

    return View::make('pages.answer')->with('question', $question);

}));

Route::get('page', array('params' => 'sample-page', function(){

    global $post;

    return View::make('pages.sample')->with('page', $post);

}));



/*Route::any('page', array('params' => 'sample-page', function(){

    $question = Input::get('question');
    $answer = 'Always 42, Honey!';

    return View::make('game', array(
        'question'  => $question,
        'answer'    => $answer
    ));

}));*/

Route::get('page', array('params' => 'welcome', function(){

    return "This is the Welcome Page.";

}));


Route::any('404', function(){

    return "This page does not exist. Try something else dude!";

});