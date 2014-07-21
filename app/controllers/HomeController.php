<?php

class HomeController extends BaseController {

    public function index($post, $query)
    {
        return View::make('home', array(

            'posts' => PostModel::all()

        ));
    }

} 