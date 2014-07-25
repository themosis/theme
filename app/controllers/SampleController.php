<?php

class SampleController extends BaseController
{
    public function __construct()
    {
        Asset::add('jl-color', 'css/color.css', array(), '1.0', 'all');
    }

    public function index($post, $query)
    {
        /**
         * Validate single input.
         */
       /* $input = Input::get('acteur');
        $actor = Validator::single($input, array('min:5'));*/

        /**
         * Validate multiple input.
         */
        $inputs = Input::all();

        $values = Validator::multiple($inputs, array(
            'acteur'    => array('min:5'),
            'director'  => array('email')
        ));

        return View::make('pages.sample', array(
            'inputs'    => $values
        ));
    }
} 