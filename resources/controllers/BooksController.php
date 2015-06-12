<?php

class BooksController extends BaseController
{
    public function before($id, $name, $fields)
    {
        tp('Before');
        tp($id);
        tp($name);
    }

    public function after($id, $name, $fields)
    {
        tp('After');
        tp($id);
        tp($name);
        td($fields);
    }
}