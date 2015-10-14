<?php

Ajax::run('my-custom-action', 'both', function()
{
    // Check nonce value
    if (false === check_ajax_referer(Session::nonceName, 'security')) die();

    // Run custom code - Make sure to sanitize and check values before
    $result = 4 + $_POST['number'];

    // "Return" the result
    echo(json_encode($result));

    // Close
    wp_die();
});

//Ajax::run('my-custom-action', 'both', 'PagesController@ajax');