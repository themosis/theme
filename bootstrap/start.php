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
    // Theme cleanup.
    /*----------------------------------------------------*/
    if (Themosis\Facades\Config::get('application.cleanup'))
    {
        add_action('init', 'themosisThemeCleanup');
    }

    /*----------------------------------------------------*/
    // Theme restriction. Block wp-admin access.
    /*----------------------------------------------------*/
    $access = Themosis\Facades\Config::get('application.access');

    if (!empty($access) && is_array($access))
    {
        add_action('init', 'themosisThemeRestrict');
    }

    /*----------------------------------------------------*/
    // Theme constants.
    /*----------------------------------------------------*/
    $constants = Themosis\Facades\Config::get('constants');
    $constant = new Themosis\Configuration\Constant($constants);
    $constant->make();

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
// Theme cleanup.
/*----------------------------------------------------*/
function themosisThemeCleanup()
{
    global $wp_widget_factory;

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    if (array_key_exists('WP_Widget_Recent_Comments', $wp_widget_factory->widgets))
    {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }

    add_filter('use_default_gallery_style', '__return_null');
}

/*----------------------------------------------------*/
// Theme restriction.
/*----------------------------------------------------*/
function themosisThemeRestrict()
{
    $access = Themosis\Facades\Config::get('application.access');

    if (is_admin())
    {
        $user = wp_get_current_user();
        $role = $user->roles;
        $role = (count($role) > 0) ? $role[0] : '';

        if (!in_array($role, $access) && !(defined('DOING_AJAX') && DOING_AJAX)  && !(defined('WP_CLI') && WP_CLI))
        {
            wp_redirect(home_url());
            exit;
        }
    }
}

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