<?php

View::composer('home', function($view)
{
    $view->with('composed', 'Data from view composer.');
});

/*View::composer('home', 'HomeComposer');

View::composer(array('home', 'pages.sample'), function($view)
{
    $view->with('common', 'Common data added by a view composer.');
});*/

View::composers(array(
    'HomeComposer'          => 'home',
    'HomeComposer@special'  => array('home', 'pages.sample'),
));