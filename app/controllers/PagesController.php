<?php

class PagesController extends BaseController
{
    public function home()
    {
        return View::make('welcome');
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
}