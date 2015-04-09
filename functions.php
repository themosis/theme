<?php
/*
 * Themosis - A framework for WordPress developers.
 * Based on php 5.4 features and above.
 *
 * @author  Julien Lambé <julien@themosis.com>
 * @link 	http://www.themosis.com/
 */

/*----------------------------------------------------*/
// The directory separator.
/*----------------------------------------------------*/
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

/*----------------------------------------------------*/
// Asset directory URL.
/*----------------------------------------------------*/
defined('THEMOSIS_ASSETS') ? THEMOSIS_ASSETS : define('THEMOSIS_ASSETS', get_template_directory_uri().'/app/assets');

/*----------------------------------------------------*/
// Theme Textdomain.
/*----------------------------------------------------*/
defined('THEMOSIS_THEME_TEXTDOMAIN') ? THEMOSIS_THEME_TEXTDOMAIN : define('THEMOSIS_THEME_TEXTDOMAIN', 'themosis-theme');

/*----------------------------------------------------*/
// Themosis Theme class.
// Check if the framework is loaded. If not, warn the user
// to activate it before continuing using the theme.
/*----------------------------------------------------*/
if (!class_exists('THFWK_ThemosisTheme'))
{
    class THFWK_ThemosisTheme
    {
        /**
         * Theme class instance.
         *
         * @var \THFWK_ThemosisTheme
         */
        private static $instance = null;
        
        /**
         * Switch that tell if core and datas plugins are loaded.
         *
         * @var bool
         */
        private $pluginsAreLoaded = false;

        private function __construct()
        {
        	// Check if framework is loaded.
        	add_action('after_setup_theme', array($this, 'check'));
        }
        
        /**
    	 * Init the class.
         *
         * @return \THFWK_ThemosisTheme
    	 */
    	public static function getInstance()
    	{
    		if (is_null(static::$instance))
            {
    	    	static::$instance = new static();  
    	    }
    	 	return static::$instance;
    	}
    	
    	/**
         * Trigger by the action hook 'after_switch_theme'.
         * Check if the framework and dependencies are loaded.
         *
         * @return void
    	 */
    	public function check()
    	{
            $symfony = class_exists('Symfony\Component\ClassLoader\ClassLoader');
    	    $themosis = class_exists('THFWK_Themosis');

            // Symfony dependency and Themosis plugin classes are available.
            if ($symfony && $themosis)
            {
                $this->pluginsAreLoaded = $themosis;
            }

        	// Display a message to the user in the admin panel when he's activating the theme
            // if the plugin is not available.
        	if (!$themosis)
            {
            	add_action('admin_notices', array($this, 'displayMessage'));
                return;
        	}

            // Display a message if Symfony Class Loader component is not available.
            if (!$symfony)
            {
                add_action('admin_notices', array($this, 'displayNotice'));
                return;
            }
    	}
    	
    	/**
         * Display a notice to the user if framework is not loaded.
         *
         * @return void
    	 */
    	public function displayMessage()
    	{
    		?>
    		    <div id="message" class="error">
                    <p><?php _e("You first need to activate the <b>Themosis framework</b> in order to use this theme.", THEMOSIS_THEME_TEXTDOMAIN); ?></p>
                </div>
    		<?php
    	}

        /**
         * Display a notice to the user if the Symfony class loaded is not available.
         *
         * @return void
         */
        public function displayNotice()
        {
        ?>
            <div id="message" class="error">
                <p><?php _e(sprintf('<b>Themosis theme:</b> %s', "Symfony Class Loader component not found. Make sure the Themosis plugin includes it before proceeding."), THEMOSIS_THEME_TEXTDOMAIN); ?></p>
            </div>
        <?php
        }
    	
    	/**
         * Return true if framework is loaded.
         *
         * @return boolean
    	 */
    	public function isPluginLoaded()
    	{
    		return $this->pluginsAreLoaded;
    	}
    }
}

/*----------------------------------------------------*/
// Instantiate the theme class.
/*----------------------------------------------------*/
THFWK_ThemosisTheme::getInstance();

/*----------------------------------------------------*/
// Set theme's paths.
/*----------------------------------------------------*/
add_filter('themosis_framework_paths', 'themosis_setApplicationPaths');
add_filter('themosis_application_paths', 'themosis_setApplicationPaths');

if (!function_exists('themosis_setApplicationPaths'))
{
    function themosis_setApplicationPaths($paths)
    {
        // Theme base path.
        $paths['base'] = __DIR__.DS;

        // Application path.
        $paths['app'] = __DIR__.DS.'app'.DS;

        // Application admin directory.
        $paths['admin'] = __DIR__.DS.'app'.DS.'admin'.DS;

        // Application storage directory.
        $paths['storage'] = __DIR__.DS.'app'.DS.'storage'.DS;

        return $paths;
    }
}

/*----------------------------------------------------*/
// Set theme's configurations.
/*----------------------------------------------------*/
add_action('themosis_configurations', function()
{
    Themosis\Configuration\Config::make(array(
        'app'    => array(
            'application',
            'constants',
            'images',
            'loading',
            'menus',
            'sidebars',
            'supports',
            'templates'
        )
    ));

   Themosis\Configuration\Config::set();
});

/*----------------------------------------------------*/
// Register theme view paths.
/*----------------------------------------------------*/
add_filter('themosisViewPaths', function($paths)
{
    $paths[] = themosis_path('app').'views'.DS;
    return $paths;
});

/*----------------------------------------------------*/
// Register theme asset paths.
/*----------------------------------------------------*/
add_filter('themosisAssetPaths', function($paths)
{
    $paths[THEMOSIS_ASSETS] = themosis_path('app').'assets';
    return $paths;
});

/*----------------------------------------------------*/
// Bootstrap theme.
/*----------------------------------------------------*/
add_action('themosis_bootstrap', function()
{
    /*----------------------------------------------------*/
    // Handle errors, warnings, exceptions.
    /*----------------------------------------------------*/
    set_exception_handler(function($e)
    {
        Themosis\Error\Error::exception($e);
    });

    set_error_handler(function($code, $error, $file, $line)
    {
        // Check if the class exists
        // Otherwise WP can't find it when
        // constructing its "Menus" page
        // under appearance in administration.
        if (class_exists('Themosis\Error\Error'))
        {
            Themosis\Error\Error::native($code, $error, $file, $line);
        }
    });

    if (defined('THEMOSIS_ERROR_SHUTDOWN') && THEMOSIS_ERROR_SHUTDOWN)
    {
        register_shutdown_function(function()
        {
            Themosis\Error\Error::shutdown();
        });
    }

    // Passing in the value -1 will show every errors.
    $report = defined('THEMOSIS_ERROR_REPORT') ? THEMOSIS_ERROR_REPORT : 0;
    error_reporting($report);

    /*----------------------------------------------------*/
    // Set class aliases.
    /*----------------------------------------------------*/
    $aliases = Themosis\Configuration\Application::get('aliases');

    foreach ($aliases as $namespace => $className)
    {
        class_alias($namespace, $className);
    }

    /*----------------------------------------------------*/
    // Application textdomain.
    /*----------------------------------------------------*/
    defined('THEMOSIS_TEXTDOMAIN') ? THEMOSIS_TEXTDOMAIN : define('THEMOSIS_TEXTDOMAIN', Themosis\Configuration\Application::get('textdomain'));

    /*----------------------------------------------------*/
    // Trigger framework default configuration.
    /*----------------------------------------------------*/
    Themosis\Configuration\Configuration::make();

    /*----------------------------------------------------*/
    // Application constants.
    /*----------------------------------------------------*/
    Themosis\Configuration\Constant::load();

    /*----------------------------------------------------*/
    // Application page templates.
    /*----------------------------------------------------*/
    Themosis\Configuration\Template::init();

    /*----------------------------------------------------*/
    // Application image sizes.
    /*----------------------------------------------------*/
    Themosis\Configuration\Images::install();

    /*----------------------------------------------------*/
    // Parse application files and include them.
    // Extends the 'functions.php' file by loading
    // files located under the 'admin' folder.
    /*----------------------------------------------------*/
    Themosis\Core\AdminLoader::add();
    Themosis\Core\WidgetLoader::add();

    /*----------------------------------------------------*/
    // Application widgets.
    /*----------------------------------------------------*/
    Themosis\Core\WidgetLoader::load();

    /*----------------------------------------------------*/
    // Application global JS object.
    /*----------------------------------------------------*/
    Themosis\Ajax\Ajax::set();
});

/*----------------------------------------------------*/
// Handle application requests/responses.
/*----------------------------------------------------*/
function themosis_start_app()
{
    if (THFWK_ThemosisTheme::getInstance()->isPluginLoaded())
    {
        do_action('themosis_parse_query', $arg = '');

        /*----------------------------------------------------*/
        // Application routes.
        /*----------------------------------------------------*/
        require themosis_path('app').'routes.php';

        /*----------------------------------------------------*/
        // Run application and return a response.
        /*----------------------------------------------------*/
        do_action('themosis_run');
	}
    else
    {
        _e("The theme won't work until you install the Themosis framework plugin correctly.", THEMOSIS_THEME_TEXTDOMAIN);
	}
}