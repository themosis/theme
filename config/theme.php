<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme Class Autoloading
    |--------------------------------------------------------------------------
    |
    | Define PSR-4 autoloading rules for your theme PHP classes. The key is
    | the namespace and the value is the relative path, from theme's root
    | directory, to the directory holding your files.
    |
    */
    'autoloading' => [
        'Theme\\' => 'resources'
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */
    'providers' => [
        Theme\Providers\RouteServiceProvider::class
    ]
];
