<?php

class HomeController extends BaseController {

    public function index()
    {
        return View::make('home', array(

            'posts' => PostModel::all()

        ));
    }

} 