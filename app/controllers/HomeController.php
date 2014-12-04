<?php
namespace ThemosisTheme;

use View;
use ThemosisTheme\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('welcome');
    }
}
