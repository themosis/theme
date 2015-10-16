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

/**
 * Helper function to setup assets URL
 */
if (!function_exists('themosis_theme_assets'))
{
    /**
     * Return the application theme assets directory URL.
     *
     * @return string
     */
    function themosis_theme_assets()
    {
        if (is_multisite() && SUBDOMAIN_INSTALL)
        {
            $segments = explode('themes', get_template_directory_uri());
            $theme = (strpos($segments[1], DS) !== false) ? substr($segments[1], 1) : $segments[1];
            return get_site_url().'/'.CONTENT_DIR.'/themes/'.$theme.'/resources/assets';
        }

        return get_template_directory_uri().'/resources/assets';
    }
}

/*----------------------------------------------------*/
// Asset directory URL.
/*----------------------------------------------------*/
defined('THEMOSIS_ASSETS') ? THEMOSIS_ASSETS : define('THEMOSIS_ASSETS', themosis_theme_assets());

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
        protected static $instance = null;
        
        /**
         * Switch that tell if core and datas plugins are loaded.
         *
         * @var bool
         */
        protected $pluginsAreLoaded = false;

        protected function __construct()
        {
            // Default path to Composer autoload file.
            $autoload = __DIR__.DS.'vendor'.DS.'autoload.php';

            // Check for autoload file in dev mode (vendor loaded into the theme)
            if (file_exists($autoload))
            {
                require($autoload);
            }

        	// Check if framework is loaded.
            $this->check();
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
            // Check if core application class is loaded...
            if (!class_exists('Themosis\Core\Application'))
            {
                // Message for the back-end
                add_action('admin_notices', [$this, 'displayMessage']);

                // Message for the front-end
                if (!is_admin())
                {
                    wp_die(__("The <strong>Themosis theme</strong> can't work properly. Please make sure the Themosis framework plugin is installed. Check also your <strong>composer.json</strong> autoloading configuration.", THEMOSIS_THEME_TEXTDOMAIN));
                }

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
    }
}

/*----------------------------------------------------*/
// Instantiate the theme class.
/*----------------------------------------------------*/
THFWK_ThemosisTheme::getInstance();

/*----------------------------------------------------*/
// Set theme's paths.
/*----------------------------------------------------*/
// Theme base path.
$paths['base'] = __DIR__.DS;

// Application path.
$paths['theme'] = __DIR__.DS.'resources'.DS;

// Application admin directory.
$paths['admin'] = __DIR__.DS.'resources'.DS.'admin'.DS;

themosis_set_paths($paths);

/*----------------------------------------------------*/
// Start the theme.
/*----------------------------------------------------*/
require_once('bootstrap'.DS.'start.php');