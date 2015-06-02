<?php

/*----------------------------------------------------*/
// Set theme's configurations.
/*----------------------------------------------------*/
add_action('themosis_configuration', function()
{
    // Load the theme configuration files.
    add_filter('themosisConfigPaths', function($paths)
    {
        $paths[] = themosis_path('theme').'config'.DS;
        return $paths;
    });
});

/*----------------------------------------------------*/
// Register theme view paths.
/*----------------------------------------------------*/
add_filter('themosisViewPaths', function($paths)
{
    $paths[] = themosis_path('theme').'views'.DS;
    return $paths;
});

/*----------------------------------------------------*/
// Register theme asset paths.
/*----------------------------------------------------*/
add_filter('themosisAssetPaths', function($paths)
{
    $paths[THEMOSIS_ASSETS] = themosis_path('theme').'assets';
    return $paths;
});

/*----------------------------------------------------*/
// Bootstrap the theme.
/*----------------------------------------------------*/
add_action('themosis_bootstrap', function()
{
    /*----------------------------------------------------*/
    // Handle errors, warnings, exceptions.
    /*----------------------------------------------------*/
    set_exception_handler(function($e)
    {
        Themosis\Error\Error::exception($e);
    });

    set_error_handler(function($code, $error, $file, $line)
    {
        // Check if the class exists
        // Otherwise WP can't find it when
        // constructing its "Menus" page
        // under appearance in administration.
        if (class_exists('Themosis\Error\Error'))
        {
            Themosis\Error\Error::native($code, $error, $file, $line);
        }
    });

    if (defined('THEMOSIS_ERROR_SHUTDOWN') && THEMOSIS_ERROR_SHUTDOWN)
    {
        register_shutdown_function(function()
        {
            Themosis\Error\Error::shutdown();
        });
    }

    // Passing in the value -1 will show every errors.
    $report = defined('THEMOSIS_ERROR_REPORT') ? THEMOSIS_ERROR_REPORT : 0;
    error_reporting($report);

    /*----------------------------------------------------*/
    // Set class aliases.
    /*----------------------------------------------------*/
    $aliases = Themosis\Facades\Config::get('application.aliases');

    foreach ($aliases as $namespace => $className)
    {
        class_alias($namespace, $className);
    }

    /*----------------------------------------------------*/
    // Application textdomain.
    /*----------------------------------------------------*/
    defined('THEMOSIS_TEXTDOMAIN') ? THEMOSIS_TEXTDOMAIN : define('THEMOSIS_TEXTDOMAIN', Themosis\Facades\Config::get('application.textdomain'));

    /*----------------------------------------------------*/
    // Trigger framework default configuration.
    /*----------------------------------------------------*/
    //Themosis\Configuration\Configuration::make();

    /*----------------------------------------------------*/
    // Application constants.
    /*----------------------------------------------------*/
    //Themosis\Configuration\Constant::load();

    /*----------------------------------------------------*/
    // Application page templates.
    /*----------------------------------------------------*/
    //Themosis\Configuration\Template::init();

    /*----------------------------------------------------*/
    // Application image sizes.
    /*----------------------------------------------------*/
    //Themosis\Configuration\Images::install();

    /*----------------------------------------------------*/
    // Parse application files and include them.
    // Extends the 'functions.php' file by loading
    // files located under the 'admin' folder.
    /*----------------------------------------------------*/
    Themosis\Core\AdminLoader::add();
    Themosis\Core\WidgetLoader::add();

    /*----------------------------------------------------*/
    // Application widgets.
    /*----------------------------------------------------*/
    Themosis\Core\WidgetLoader::load();

    /*----------------------------------------------------*/
    // Application global JS object.
    /*----------------------------------------------------*/
    Themosis\Ajax\Ajax::set();
});

/*----------------------------------------------------*/
// Handle application requests/responses.
/*----------------------------------------------------*/
function themosis_start_app()
{
    do_action('themosis_parse_query', $arg = '');

    /*----------------------------------------------------*/
    // Application routes.
    /*----------------------------------------------------*/
    require themosis_path('theme').'routes.php';

    /*----------------------------------------------------*/
    // Run application and return a response.
    /*----------------------------------------------------*/
    do_action('themosis_run');
}