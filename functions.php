<?php
/*
 * Themosis - A framework for WordPress developers.
 * Based on php 5.3.3 features and above.
 *
 * @author  Julien Lambé <julien@jlambe.be>
 * @link 	http://www.jlambe.be/
 */ 
/*----------------------------------------------------*/
// Define some globals used along the theme.
/*---------------------------------------------------*/
// The directory separator.
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

// Asset directory path.
defined('THEMOSIS_ASSETS') ? THEMOSIS_ASSETS : define('THEMOSIS_ASSETS', get_template_directory_uri().'/app/assets');

// Textdomain.
defined('THEMOSIS_THEME_TEXTDOMAIN') ? THEMOSIS_THEME_TEXTDOMAIN : define('THEMOSIS_THEME_TEXTDOMAIN', 'themosis-theme');

/*----------------------------------------------------
| Themosis Theme class.
|
| Check if plugins are loaded. If not, warn the user
| to activate them before continuing using this theme.
|
|
|---------------------------------------------------*/
if (!class_exists('THFWK_ThemosisTheme'))
{
    class THFWK_ThemosisTheme
    {
        /**
         * Theme class instance
        */
        private static $instance = null;
        
        /**
         * Switch that tell if core and datas plugins are loaded
        */
        private $pluginsAreLoaded = false;
    
        /**
         * Avoid to instantiate the class
        */
        private function __construct()
        {
        	// Check if plugins are loaded
        	add_action('after_setup_theme', array(&$this, 'check'));
        }
        
        /**
    	 * Init the datas class.
         *
         * @return \THFWK_ThemosisTheme
    	*/
    	public static function getInstance()
    	{
    		if (is_null(static::$instance)) {
    	    	static::$instance = new static();  
    	    }
    	 	return static::$instance;
    	}
    	
    	/**
         * Trigger by the action hook 'after_switch_theme'.
         * Check if themosis data plugins is loaded.
         * If not, tell the user...
         *
         * @return void
    	*/
    	public function check()
    	{
            $symfony = class_exists('Symfony\Component\ClassLoader\ClassLoader');
    	    $themosis = class_exists('THFWK_Themosis');

            // Symfony dependency and Themosis plugin classes are available.
            if($symfony && $themosis)
            {
                $this->pluginsAreLoaded = $themosis;
            }
        	
        	// Display a message to the user in the admin panel when he's activating the theme.
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

            // Autoload theme classes.
            $loader = new Symfony\Component\ClassLoader\Psr4ClassLoader();
            $loader->addPrefix('', 'app/controllers');
            $loader->register();
    	}
    	
    	/**
         * Display a message to the user to explain him/her
         * to activate the core and datas plugins that come
         * in the framework.
         *
         * @return void
    	*/
    	public function displayMessage()
    	{
    		?>
    		    <div id="message" class="error">
                    <p><?php _e("You first need to activate the <b>Themosis</b> plugin in order to use this theme.", THEMOSIS_THEME_TEXTDOMAIN); ?></p>
                </div>
    		<?php
    	}

        /**
         * Display a notice to administrators when the
         * Symfony Class Loader component is missing.
         *
         * @return void
         */
        public function displayNotice()
        {
        ?>
            <div id="message" class="error">
                <p><?php _e(sprintf('<b>Themosis theme:</b> %s', "Symfony Class Loader component not found. Make sure to include it before proceeding."), THEMOSIS_THEME_TEXTDOMAIN); ?></p>
            </div>
        <?php
        }
    	
    	/**
         * Getter - Get the value of the property
         * pluginsAreLoaded.
         *
         * @return boolean
    	*/
    	public function isPluginLoaded()
    	{
    		return $this->pluginsAreLoaded;
    	}
    }
}

/*----------------------------------------------------
| Instantiate the theme class.
|
|
|
|
|
|---------------------------------------------------*/
THFWK_ThemosisTheme::getInstance();

/*----------------------------------------------------
| Set the theme's paths for the framework.
|
|
|
|
|
|---------------------------------------------------*/
add_filter('themosis_framework_paths', function($paths){
   
   // Theme base path
   $paths['base'] = realpath(__DIR__).DS;
   
   // Application path
   $paths['app'] = realpath(__DIR__).DS.'app'.DS;
   
   return $paths;
    
});

/*----------------------------------------------------
| Set the theme's configuration files.
| 'app' key is set to define the framework path.
|
|
|
|
|---------------------------------------------------*/
add_action('themosis_configurations', function(){
   
   $themeConfigs = array(
       'app'    => array(
           'menus',
           'sidebars',
           'supports',
           'templates'
        )
   );
   
   Themosis\Configuration\Config::make($themeConfigs);
   Themosis\Configuration\Config::set();
   
});

/*----------------------------------------------------
| Register the theme view paths.
|
|
|
|
|---------------------------------------------------*/
add_filter('themosisViewPaths', function($paths){

    $paths[] = themosis_path('app').'views'.DS;

    return $paths;

});

/*----------------------------------------------------
| Register the theme asset paths.
|
|
|
|
|---------------------------------------------------*/
add_filter('themosisAssetPaths', function($paths){

    $themeUrl = get_template_directory_uri().'/app/assets';
    $paths[$themeUrl] = themosis_path('app').'assets';

    return $paths;

});

/*----------------------------------------------------
| Launch the application's theme.
|
|
|
|
|
|---------------------------------------------------*/
function themosis_start_app(){
    
    if (THFWK_ThemosisTheme::getInstance()->isPluginLoaded())
    {
    	do_action('themosis_parse_query', $arg = '');
    
    	require themosis_path('app').'routes.php';
    
    	// Trigger output.
    	do_action('themosis_run');
	}
    else
    {
        _e("The theme won't work until you install the Themosis framework plugin correctly.", THEMOSIS_THEME_TEXTDOMAIN);
	}
}