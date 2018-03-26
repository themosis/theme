<?php

namespace Theme\Providers;

use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;
use Themosis\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Controller namespace for theme routes.
     *
     * @var string
     */
    protected $namespace = 'Theme\Controllers';

    public function boot()
    {
        parent::boot();
    }

    /**
     * Load theme routes.
     */
    public function map()
    {
        $themeName = ltrim(
            str_replace($this->app->themesPath(), '', realpath(__DIR__.'/../../')),
            '\/'
        );

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(themes_path($themeName.'/routes.php'));
    }
}
