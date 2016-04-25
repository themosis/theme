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

// THEMOSIS
$themosis = $GLOBALS['themosis'];
$app = $themosis->app;

/*///////////////////////////////////////////////////////*/
$configFinder = $app->get('config.finder');
$configFinder->addPaths([themosis_path('theme').'config'.DS]);

/*----------------------------------------------------*/
// Theme global JS object.
/*----------------------------------------------------*/
add_action('wp_head', 'themosisInstallThemeGlobalObject');

/*----------------------------------------------------*/
// Theme JS global object.
/*----------------------------------------------------*/
function themosisInstallThemeGlobalObject()
{
    $namespace = Themosis\Facades\Config::get('application.namespace');
    $url = admin_url().Themosis\Facades\Config::get('application.ajaxurl').'.php';

    $datas = apply_filters('themosisGlobalObject', []);

    $output = "<script type=\"text/javascript\">\n\r";
    $output.= "//<![CDATA[\n\r";
    $output.= "var ".$namespace." = {\n\r";
    $output.= "ajaxurl: '".$url."',\n\r";

    if (!empty($datas))
    {
        foreach ($datas as $key => $value)
        {
            $output.= $key.": ".json_encode($value).",\n\r";
        }
    }

    $output.= "};\n\r";
    $output.= "//]]>\n\r";
    $output.= "</script>";

    // Output the datas.
    echo($output);
}


$assetFinder = $app->get('asset.finder');
$assetFinder->addPaths([THEMOSIS_ASSETS => themosis_path('theme').'assets']);

\Themosis\Facades\Asset::add('test-css', 'css/screen.css');
\Themosis\Facades\Asset::add('test-ajax', 'js/ajax.js', ['jquery'], '1.0', true);

\Themosis\Facades\Action::add('init', function()
{
    //echo('Init from action.');
});

\Themosis\Facades\Ajax::run('my-custom-action', 'both', function()
{
    // Run custom code - Make sure to sanitize and check values before
    $result = 4 + $_POST['number'];

    // "Return" the result
    echo(json_encode($result));

    // Close
    wp_die();
});