<?php
namespace MVPDesign\ThemosisTheme\Controllers;

use View;
use MVPDesign\ThemosisTheme\Controllers\BaseController;

class HomeController extends BaseController
{
    /**
     * The layout used by the controller.
     */
    protected $layout = 'layouts.default';

    /**
     * The default method
     *
     * @return void
     */
    public function index()
    {
        $this->layout->content = View::make('pages.home');
    }
}
