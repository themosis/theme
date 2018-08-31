<?php

use Themosis\Core\Application;
use Themosis\Support\Facades\Asset;

/*
|--------------------------------------------------------------------------
| Bootstrap Theme
|--------------------------------------------------------------------------
|
| We bootstrap the theme. The following code is loading your theme
| configuration files and register theme images sizes, menus, sidebars,
| theme support features and templates.
*/
$theme = (Application::getInstance())->loadTheme(__DIR__, 'config');

/*
|--------------------------------------------------------------------------
| Theme assets locations
|--------------------------------------------------------------------------
|
| You can define your theme assets paths and URLs. You can add as many
| locations as you want. The key is your asset directory path and
| the value is its public URL.
*/
$theme->assets([
    $theme->getPath('dist') => $theme->getUrl('dist')
]);

/*
|--------------------------------------------------------------------------
| Theme i18n | l10n
|--------------------------------------------------------------------------
|
| Registers the "languages" directory for storing the theme translations.
| The "THEME_TD" constant is defined during bootstrap and its value is
| set based on the "style.css" [Text Domain] property located into
| the file header.
|
*/
load_theme_textdomain(
    THEME_TD,
    $theme->getPath('languages')
);

/*
|--------------------------------------------------------------------------
| Theme includes
|--------------------------------------------------------------------------
|
| Auto includes files by providing one or more paths. By default, we setup
| an "inc" directory within the theme. Use that "inc" directory to extend
| your theme features. Nested files are also included.
|
*/
$theme->includes([
    $theme->getPath('inc')
]);

/*
|--------------------------------------------------------------------------
| Theme Assets
|--------------------------------------------------------------------------
|
| Here we define the loaded assets from our previously defined
| "dist" directory. Assets sources are located under the root "assets"
| directory and are then compiled, thanks to Laravel Mix, to the "dist"
| folder.
|
| @see https://laravel-mix.com/
|
*/
Asset::add('theme_styles', 'css/theme.css', false, $theme->getHeader('version'))->to('front');
Asset::add('theme_woo', 'css/woocommerce.css', 'theme_styles', $theme->getHeader('version'))->to('front');
Asset::add('theme_js', 'js/theme.min.js', false, $theme->getHeader('version'))->to('front');
