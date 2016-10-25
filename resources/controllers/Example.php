<?php

namespace Themosis\Theme\Controllers;

use Themosis\Route\BaseController;

class Example extends BaseController
{
    public function index()
    {
        return view('pages.index');
    }

    public function books()
    {
        return "Books single from controller";
    }

    public function singular()
    {
        return "All singular from controller";
    }

    public function notfound()
    {
        return "Not found from controller";
    }
}
