<?php

use Themosis\Core\Application;

/*
|--------------------------------------------------------------------------
| Bootstrap Theme
|--------------------------------------------------------------------------
|
| We bootstrap the theme. The following code is loading your theme
| configuration files and register theme images sizes, menus, sidebars,
| theme support features and templates.
|
*/
$theme = (Application::getInstance())->loadTheme(__DIR__, 'config');

/*
|--------------------------------------------------------------------------
| Theme i18n | l10n
|--------------------------------------------------------------------------
|
| Registers the "languages" directory for storing the theme translations.
|
| The "THEME_TD" constant is defined during bootstrap and its value is
| set based on the "style.css" [Text Domain] property located into
| the file header.
|
*/
load_theme_textdomain(
    THEME_TD,
    $theme->getPath($theme->getHeader('domain_path'))
);

/*
|--------------------------------------------------------------------------
| Theme assets locations
|--------------------------------------------------------------------------
|
| You can define your theme assets paths and URLs. You can add as many
| locations as you want. The key is your asset directory path and
| the value is its public URL.
|
*/
$theme->assets([
    $theme->getPath('dist') => $theme->getUrl('dist')
]);

/*
|--------------------------------------------------------------------------
| Theme Views
|--------------------------------------------------------------------------
|
| Register theme view paths. By default, the theme is registering
| the "views" directory but you can add as many directories as you want
| from the theme.php configuration file.
|
*/
$theme->views($theme->config('theme.views', []));

/*
|--------------------------------------------------------------------------
| Theme Service Providers
|--------------------------------------------------------------------------
|
| Register theme service providers. You can manage the list of
| services providers through the theme.php configuration file.
|
*/
$theme->providers($theme->config('theme.providers', []));

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
| Theme Image Sizes
|--------------------------------------------------------------------------
|
| Register theme image sizes. Image sizes are configured in your theme
| images.php configuration file.
|
*/
$theme->images($theme->config('images'));

/*
|--------------------------------------------------------------------------
| Theme Menu Locations
|--------------------------------------------------------------------------
|
| Register theme menu locations. Menu locations are configured in your theme
| menus.php configuration file.
|
*/
$theme->menus($theme->config('menus'));

/*
|--------------------------------------------------------------------------
| Theme Sidebars
|--------------------------------------------------------------------------
|
| Register theme sidebars. Sidebars are configured in your theme
| sidebars.php configuration file.
|
*/
$theme->sidebars($theme->config('sidebars'));

/*
|--------------------------------------------------------------------------
| Theme Support
|--------------------------------------------------------------------------
|
| Register theme support. Support features are configured in your theme
| support.php configuration file.
|
*/
$theme->support($theme->config('support', []));

/*
|--------------------------------------------------------------------------
| Theme Templates
|--------------------------------------------------------------------------
|
| Register theme templates. Templates are configured in your theme
| templates.php configuration file.
|
*/
$theme->templates($theme->config('templates', []));
