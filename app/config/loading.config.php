<?php

return array(

    /**
     * Mapping for all classes without a namespace.
     * The key is the class name and the value is the
     * absolute path to your class file.
     *
     * Watch your commas...
     */
    // Controllers
    'ThemosisTheme\BaseController' => themosis_path('app').'controllers'.DS.'BaseController.php',
    'ThemosisTheme\HomeController' => themosis_path('app').'controllers'.DS.'HomeController.php',

    // Models
    'ThemosisTheme\PostModel' => themosis_path('app').'models'.DS.'PostModel.php',

    // Miscellaneous

);
