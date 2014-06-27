<?php

class ProutController extends BaseController
{
    protected $layout = 'layout';

    private $name;

    public function __construct()
    {
        $this->name = 'Julien The Controller';

        Asset::add('th-script', 'js/themosis.js', array('jquery'), '1.0', true);
    }

    public function simple()
    {
        return 'Hi from Prout';
    }

    public function advanced()
    {
        $user = User::make('orlenka', 'superpassword', 'orlenka@themosis.com');

        return View::make('pages.accueil', array('name' => $this->name));
    }

    public function layout()
    {
        $text = 'Julien';
    }

} 