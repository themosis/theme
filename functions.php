<?php
/*
 * Themosis - A PHP framework for WordPress developers.
 * Based on php 5.3.3 features and above.
 *
 * @author  Julien Lambé <julien@jlambe.be>
 * @link 	http://www.jlambe.be/
 */ 
/*----------------------------------------------------*/
// Define some globals used along the theme.
/*---------------------------------------------------*/
// The directory separator
defined('DS') ? DS : define('DS', '/');

// Asset directory path
defined('THEMOSIS_ASSETS') ? THEMOSIS_ASSETS : define('THEMOSIS_ASSETS', get_template_directory_uri().DS.'app'.DS.'assets');

// Views directory path
defined('THEMOSIS_VIEWS') ? THEMOSIS_VIEWS : define('THEMOSIS_VIEWS', get_template_directory_uri().DS.'app'.DS.'views');

// Textdomain
defined('THEMOSISTHEME_TEXTDOMAIN') ? THEMOSISTHEME_TEXTDOMAIN : define('THEMOSISTHEME_TEXTDOMAIN', 'ThemosisTheme');

/*----------------------------------------------------
| Themosis Theme class
|
| Check if plugins are loaded. If not, warn the user
| to activate them before continuing using this theme.
|
|
|---------------------------------------------------*/
if (!class_exists('THFWK_ThemosisTheme')) {
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
    	*/
    	public function check()
    	{   
    	    $themosis = class_exists('THFWK_Themosis');
    	           	    
        	$this->pluginsAreLoaded = $themosis;
        	
        	// Display a message to the user in the admin panel when he's activating the theme.
        	if (!$themosis) {
            	add_action('admin_notices', array(&$this, 'displayMessage'));
        	}
    	}
    	
    	/**
         * Display a message to the user to explain him/her
         * to activate the core and datas plugins that come
         * in the framework.
    	*/
    	public function displayMessage()
    	{
    		?>
    		    <div id="message" class="error">
                    <p><?php _e("You first need to activate the <b>Themosis</b> plugin in order to use this theme.", THEMOSISTHEME_TEXTDOMAIN); ?></p>
                </div>
    		<?php
    	}
    	
    	/**
         * Getter - Get the value of the property
         * pluginsAreLoaded
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
| Instantiate the theme class
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
   $paths['app'] = realpath(__DIR__.DS.'app').DS;
   
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
| Launch the application's theme
|
|
|
|
|
|---------------------------------------------------*/
function themosis_start_app(){
    
    if (THFWK_ThemosisTheme::getInstance()->isPluginLoaded()) {
        // Used by the view classes
    	chdir(themosis_path('app').'views'.DS);
    
    	/**
    	* Parse the queries before any output. This is parsed
    	* by the ROUTE class.
    	*/
    	do_action('themosis_parse_query', $arg = '');
    
    	require themosis_path('app').'routes.php';
    
    	// Handle the output of each request
    	do_action('themosis_render');   
	} else {
    	
        _e("The theme won't work correctly until you install the themosis plugin.", THEMOSISTHEME_TEXTDOMAIN);
    	
	}
}