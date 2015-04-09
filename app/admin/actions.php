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
    echo('Init action called by a closure...nothing new.');
});