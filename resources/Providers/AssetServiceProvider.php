<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Themosis\Core\ThemeManager;
use Themosis\Support\Facades\Asset;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Theme Assets
     *
     * Here we define the loaded assets from our previously defined
     * "dist" directory. Assets sources are located under the root "assets"
     * directory and are then compiled, thanks to Laravel Mix, to the "dist"
     * folder.
     *
     * @see https://laravel-mix.com/
     */
    public function register()
    {
        /** @var ThemeManager $theme */
        $theme = $this->app->make('wp.theme');

        Asset::add('theme_styles', 'css/app.css', [], filemtime($theme->getPath().'/dist/css/app.css'))->to('front');
        Asset::add('theme_js', 'js/app.min.js', ['jquery'], filemtime($theme->getPath().'/dist/js/app.min.js'))->to('front');
    }
}
