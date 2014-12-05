<?php
namespace MVPDesign\ThemosisTheme\Controllers;

use View;
use MVPDesign\ThemosisTheme\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('welcome');
    }
}
