<?php

use Themosis\Core\Application;

$app = Application::getInstance();

add_action('template_redirect', function () use ($app) {
    require $app->themesPath('themosis-theme/resources/routes.php');
});
