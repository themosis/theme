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
    'MVPDesign\ThemosisTheme\Controllers\BaseController' => themosis_path('app').'controllers'.DS.'BaseController.php',
    'MVPDesign\ThemosisTheme\Controllers\HomeController' => themosis_path('app').'controllers'.DS.'HomeController.php',

    // Models
    'MVPDesign\ThemosisTheme\Models\WPPost' => themosis_path('app').'models'.DS.'PostModel.php',

    // Miscellaneous

);
