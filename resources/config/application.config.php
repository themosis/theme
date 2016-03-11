<?php

return [

	/*
	* Edit this file in order to configure your application
	* settings or preferences.
	* 
	*/
	/* --------------------------------------------------------------- */
	// Application textdomain
	/* --------------------------------------------------------------- */
	'textdomain'    => 'themosis',

	/* --------------------------------------------------------------- */
	// Global Javascript namespace of your application
	/* --------------------------------------------------------------- */
	'namespace'     => 'themosis',

	/* --------------------------------------------------------------- */
	// Set WordPress admin ajax file without the PHP extension
	/* --------------------------------------------------------------- */
	'ajaxurl'	    => 'admin-ajax',

	/* --------------------------------------------------------------- */
	// Cleanup Header
	/* --------------------------------------------------------------- */
	'cleanup'	    => true,

	/* --------------------------------------------------------------- */
	// Restrict access to the WordPress Admin for users with a
	// specific role. 
	// Once the theme is activated, you can only log in by going
	// to 'wp-login.php' or 'login' (if permalinks changed) urls.
	// By default, allows 'administrator', 'editor', 'author',
	// 'contributor' and 'subscriber' to access the ADMIN area.
	// Edit this configuration in order to limit access.
	/* --------------------------------------------------------------- */
	'access'	    => [
		'administrator',
		'editor',
		'author',
		'contributor',
		'subscriber'
	],

	/* --------------------------------------------------------------- */
	// Theme class aliases
	/* --------------------------------------------------------------- */
	'aliases'	    => [
		'Action'        => 'Themosis\\Facades\\Action',
		'Ajax'          => 'Themosis\\Facades\\Ajax',
		'Asset'         => 'Themosis\\Facades\\Asset',
		'Config'        => 'Themosis\\Facades\\Config',
		'Controller'    => 'Themosis\\Route\\Controller',
		'Field'         => 'Themosis\\Facades\\Field',
		'Form'          => 'Themosis\\Facades\\Form',
		'Html'          => 'Themosis\\Facades\\Html',
		'Input'         => 'Themosis\\Facades\\Input',
		'Meta'          => 'Themosis\\Metabox\\Meta',
		'Metabox'       => 'Themosis\\Facades\\Metabox',
		'Option'        => 'Themosis\\Page\\Option',
		'Page'          => 'Themosis\\Facades\\Page',
		'PostType'      => 'Themosis\\Facades\\PostType',
		'Route'         => 'Themosis\\Facades\\Route',
		'Section'       => 'Themosis\\Facades\\Section',
		'Session'       => 'Themosis\\Session\\Session',
		'TaxField'      => 'Themosis\\Taxonomy\\TaxField',
		'TaxMeta'       => 'Themosis\\Taxonomy\\TaxMeta',
		'Taxonomy'      => 'Themosis\\Facades\\Taxonomy',
		'User'          => 'Themosis\\Facades\\User',
		'Validator'     => 'Themosis\\Facades\\Validator',
		'Loop'          => 'Themosis\\Facades\\Loop',
		'View'	        => 'Themosis\\Facades\\View'
	]

];