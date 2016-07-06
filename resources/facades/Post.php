<?php

namespace Themosis\Theme\Facades;

use Themosis\Facades\Facade;

class Post extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'theme.post';
    }
}