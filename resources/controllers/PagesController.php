<?php

class PagesController extends BaseController
{
    public function home()
    {
        add_filter('themosisGlobalObject', function($args)
        {
            $args['security'] = wp_create_nonce(\Themosis\Session\Session::nonceName);
            return $args;
        });

        //Asset::add('ajax', 'js/ajax.js', array('jquery'), '1.0.0', true);

        $q = new WP_Query([
            'post_type' => 'post',
            'posts_per_page'    => '5'
        ]);

        return View::make('pages.home')->with('query', $q);
    }

    public function sample()
    {
        return View::make('pages.sample', array(
            'inputs' => Input::all()
        ));
    }

    public function about()
    {
        return 'About';
    }

    public function vision()
    {
        return 'Vision';
    }

    /**
     * Called by hook "init".
     */
    public function init()
    {
        //echo('Init hook called by controller method.');
    }

    /**
     * Called by Ajax::run() method.
     */
    public function ajax()
    {
        // Check nonce value
        if (false === check_ajax_referer(Session::nonceName, 'security')) die();

        // Run custom code - Make sure to sanitize and check values before
        $result = 8 + $_POST['number'];

        // "Return" the result
        echo(json_encode($result));

        // Close
        wp_die();
    }
}