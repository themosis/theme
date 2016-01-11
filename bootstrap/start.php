<?php

/*----------------------------------------------------*/
// Set theme's configurations.
/*----------------------------------------------------*/
// Load the theme configuration files.
add_filter('themosisConfigPaths', function($paths)
{
    $paths[] = themosis_path('theme').'config'.DS;
    return $paths;
});

/*----------------------------------------------------*/
// Autoload theme classes.
/*----------------------------------------------------*/
$loader = new \Composer\Autoload\ClassLoader();
$classes = \Themosis\Facades\Config::get('loading');

foreach ($classes as $prefix => $path)
{
    $loader->addPsr4($prefix, $path);
}

$loader->register();

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
// Theme class aliases.
/*----------------------------------------------------*/
$aliases = array_merge([
    'Action'                 => 'Themosis\\Facades\\Action',
    'Ajax'                   => 'Themosis\\Facades\\Ajax',
    'Asset'                  => 'Themosis\\Facades\\Asset',
    'Config'                 => 'Themosis\\Facades\\Config',
    'Controller'             => 'Themosis\\Route\\Controller',
    'Field'                  => 'Themosis\\Facades\\Field',
    'Form'                   => 'Themosis\\Facades\\Form',
    'Html'                   => 'Themosis\\Facades\\Html',
    'Input'                  => 'Themosis\\Facades\\Input',
    'Meta'                   => 'Themosis\\Metabox\\Meta',
    'Metabox'                => 'Themosis\\Facades\\Metabox',
    'Option'                 => 'Themosis\\Page\\Option',
    'Page'                   => 'Themosis\\Facades\\Page',
    'PostType'               => 'Themosis\\Facades\\PostType',
    'Route'                  => 'Themosis\\Facades\\Route',
    'Section'                => 'Themosis\\Facades\\Section',
    'Session'                => 'Themosis\\Session\\Session',
    'TaxField'               => 'Themosis\\Taxonomy\\TaxField',
    'TaxMeta'                => 'Themosis\\Taxonomy\\TaxMeta',
    'Taxonomy'               => 'Themosis\\Facades\\Taxonomy',
    'User'                   => 'Themosis\\Facades\\User',
    'Validator'              => 'Themosis\\Facades\\Validator',
    'Loop'                   => 'Themosis\\Facades\\Loop',
    'View'                   => 'Themosis\\Facades\\View'

], Themosis\Facades\Config::get('application.aliases'));

foreach ($aliases as $alias => $namespace)
{
    class_alias($namespace, $alias);
}

/*----------------------------------------------------*/
// Theme textdomain.
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
// Theme page templates.
/*----------------------------------------------------*/
$templates = Themosis\Facades\Config::get('templates');
$tpl = new Themosis\Configuration\Template($templates);
$tpl->make();

/*----------------------------------------------------*/
// Theme image sizes.
/*----------------------------------------------------*/
$sizes = Themosis\Facades\Config::get('images');
$images = new Themosis\Configuration\Images($sizes);
$images->make();

/*----------------------------------------------------*/
// Theme menus.
/*----------------------------------------------------*/
$menus = Themosis\Facades\Config::get('menus');
new Themosis\Configuration\Menu($menus);

/*----------------------------------------------------*/
// Theme sidebars.
/*----------------------------------------------------*/
$bars = Themosis\Facades\Config::get('sidebars');
new Themosis\Configuration\Sidebar($bars);

/*----------------------------------------------------*/
// Theme supports.
/*----------------------------------------------------*/
$supports = Themosis\Facades\Config::get('supports');
new Themosis\Configuration\Support($supports);

/*----------------------------------------------------*/
// Parse application files and include them.
// Extends the 'functions.php' file by loading
// files located under the 'admin' folder.
/*----------------------------------------------------*/
$adminPath = themosis_path('admin');
new Themosis\Core\AdminLoader($adminPath);

/*----------------------------------------------------*/
// Theme widgets.
/*----------------------------------------------------*/
$widgetPath = themosis_path('theme').'widgets'.DS;
new Themosis\Core\WidgetLoader($widgetPath);

/*----------------------------------------------------*/
// Theme global JS object.
/*----------------------------------------------------*/
add_action('wp_head', 'themosisInstallThemeGlobalObject');

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
        remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
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
