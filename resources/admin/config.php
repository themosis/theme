<?php

// Return all properties from an `application.config.php` or `application.php` file.
$applications = \Themosis\Facades\Config::get('application');

tp($applications);

// Return single application property
$textdomain = Config::get('application.textdomain');

tp($textdomain);

$sidebars = Config::get('sidebars');

tp($sidebars);