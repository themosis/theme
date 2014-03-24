<?php defined('DS') or die('No direct script access.');

return array(

	/*
	* Edit this file to add widget sidebars to your theme. 
	* Place wordpress default settings for sidebars.
	* Add as many as you want, watchout your commas!
	*/
	array(

		'name'			=> 'First sidebar',
		'id'			=> 'first-sidebar',
		'description'	=> 'Area of first sidebar',
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>'

	)

);

?>