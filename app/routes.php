<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

Route::any('home', 'MVPDesign\ThemosisTheme\Controllers\HomeController@index');
Route::any('front', 'MVPDesign\ThemosisTheme\Controllers\HomeController@index');
Route::any('template', array('home', 'uses' => 'MVPDesign\ThemosisTheme\Controllers\HomeController@index'));
