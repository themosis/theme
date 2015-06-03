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
    // @TODO check assets URL issue #137
    $paths[THEMOSIS_ASSETS] = themosis_path('theme').'assets';
    return $paths;
});

/*----------------------------------------------------*/
// Theme class aliases.
/*----------------------------------------------------*/
add_filter('themosisClassAliases', function($aliases)
{
    // application.config.php aliases
    $themeAliases = Themosis\Facades\Config::get('application.aliases');

    // Allow developer to overwrite an existing alias
    $aliases = array_merge($aliases, $themeAliases);
    return $aliases;
});

/*----------------------------------------------------*/
// Bootstrap the theme.
/*----------------------------------------------------*/
add_action('themosis_bootstrap', function()
{
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