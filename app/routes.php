<?php defined('DS') or die('No direct script access.');

/*
* Define your routes and which views to display
* depending of the query.
*
* Based on Wordpress conditional tags from the Wordpress Codex
* http://codex.wordpress.org/Conditional_Tags 
*
*/
Route::is('home', function(){

	return 'Congratulations! Your Themosis installation is running well!';

});