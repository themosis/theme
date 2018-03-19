<?php

/**
 * Theme routes.
 */
$router = app('router');

$router->get('/', function () {
    return "Home";
});
