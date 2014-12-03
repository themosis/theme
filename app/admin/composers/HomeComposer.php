<?php

class HomeComposer {

    public function compose($view)
    {
        $view->with('classCompose', 'Data from the compose method of the HomeComposer class');
    }

    public function special($view)
    {
        $view->with('special', 'Data from HomeComposer special method');
    }

} 