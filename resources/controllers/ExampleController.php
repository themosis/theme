<?php

class ExampleController extends Controller
{
    public function index()
    {
        return $this->view->make('welcome');
    }
}
