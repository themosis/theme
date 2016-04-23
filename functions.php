<?php
/*
 * Themosis Theme
 *
 * @author  Julien Lambé <julien@themosis.com>
 * @link 	http://www.themosis.com/
 */

/*----------------------------------------------------*/
// The directory separator.
/*----------------------------------------------------*/
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

/**
 * Helper function to setup assets URL
 */
if (!function_exists('themosis_theme_assets'))
{
    /**
     * Return the application theme assets directory URL.
     *
     * @return string
     */
    function themosis_theme_assets()
    {
        if (is_multisite() && SUBDOMAIN_INSTALL)
        {
            $segments = explode('themes', get_template_directory_uri());
            $theme = (strpos($segments[1], DS) !== false) ? substr($segments[1], 1) : $segments[1];
            return get_site_url().'/'.CONTENT_DIR.'/themes/'.$theme.'/resources/assets';
        }

        return get_template_directory_uri().'/resources/assets';
    }
}

/*----------------------------------------------------*/
// Asset directory URL.
/*----------------------------------------------------*/
defined('THEMOSIS_ASSETS') ? THEMOSIS_ASSETS : define('THEMOSIS_ASSETS', themosis_theme_assets());

/*----------------------------------------------------*/
// Theme Textdomain.
/*----------------------------------------------------*/
defined('THEMOSIS_THEME_TEXTDOMAIN') ? THEMOSIS_THEME_TEXTDOMAIN : define('THEMOSIS_THEME_TEXTDOMAIN', 'themosis-theme');


/*----------------------------------------------------*/
// Set theme's paths.
/*----------------------------------------------------*/
// Theme base path.
$paths['base'] = __DIR__.DS;

// Application path.
$paths['theme'] = __DIR__.DS.'resources'.DS;

// Application admin directory.
$paths['admin'] = __DIR__.DS.'resources'.DS.'admin'.DS;

themosis_set_paths($paths);

add_filter('themosis_assets', function($paths)
{
    $paths[THEMOSIS_ASSETS] = themosis_path('theme').'assets';
    return $paths;
});

\Themosis\Facades\Asset::add('test-css', 'css/screen.css');