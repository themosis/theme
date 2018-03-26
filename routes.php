<?php

/**
 * Theme routes.
 */
/*Route::get('home', [
    'uses' => function ($post, $query) {
        return 'WordPress home (blog archive). If not, fallback to a home page route anyway.';
    }
]);*/

Route::get('page', function () {
    return 'WordPress Page';
});
