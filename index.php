<?php

/**
 * Default WordPress template.
 *
 * In order to work on your templates, please use the `routes.php` file
 * located into the `resources` folder.
 */

use App\Http\Kernel;
use Themosis\Core\Application;

$app = Application::getInstance();
$kernel = $app->make(Kernel::class);
$response = $kernel->handle($app['request']);
$response->send();
