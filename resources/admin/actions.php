<?php

/*
 * Define your WordPress actions for your project.
 *
 * Based on the WordPress action hooks.
 * https://developer.wordpress.org/reference/hooks/
 *
 */
Action::add('init', function()
{
    PostType::make('th-toys', 'Toys', 'Toy')->set();
});

//Action::add('init', 'PagesController');