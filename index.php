<?php

use Illuminate\Contracts\Http\Kernel;
use Themosis\Core\Application;

/**
 * Default WordPress template.
 *
 * By default, routes should be defined at application
 * root into the routes/web.php file.
 *
 * Routes can be overwritten using theme routes.php file.
 */
$app = Application::getInstance();
$app->manage(Kernel::class, $app['request']);
