<?php

/**
 * Define WordPress actions for your theme.
 *
 * Based on the WordPress action hooks.
 * https://developer.wordpress.org/reference/hooks/
 *
 */
$a1 = Action::add('init', 'function_name_to_call');

//$a1->remove('init');

Action::remove('init', 10, 'function_name_to_call');

function function_name_to_call()
{
    echo "Function to call";
}