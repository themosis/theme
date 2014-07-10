<?php

class SampleController extends BaseController
{
    public function __construct()
    {
        Asset::add('jl-color', 'css/color.css', array(), '1.0', 'all');
    }

    public function index()
    {
        return View::make('pages.sample');
    }
} 