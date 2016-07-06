<?php

namespace Themosis\Theme\Providers;

use Themosis\Foundation\ServiceProvider;
use Themosis\Theme\Models\Post;

class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('theme.post', function () {
            $query = new \WP_Query();
            return new Post($query);
        });
    }
}