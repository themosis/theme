<?php

/**
 * Edit this file in order to add theme support features.
 *
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 */
return [
    /* --------------------------------------------------------------- */
    // Enable post thumbnails
    /* --------------------------------------------------------------- */
    'post-thumbnails' => ['post'],

    /* --------------------------------------------------------------- */
    // Enable post formats (aside, gallery, link, image, ...)
    /* --------------------------------------------------------------- */
    'post-formats' => [],

    /* --------------------------------------------------------------- */
    // Enable title tag
    /* --------------------------------------------------------------- */
    'title-tag',

    /* --------------------------------------------------------------- */
    // Enable HTML5 features
    /* --------------------------------------------------------------- */
    'html5' => ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption'],

    /* --------------------------------------------------------------- */
    // Enable feed links in head
    /* --------------------------------------------------------------- */
    //'automatic-feed-links',

    /* --------------------------------------------------------------- */
    // Enable Customize Selective Refresh Widgets
    /* --------------------------------------------------------------- */
    //'customize-selective-refresh-widgets',

    /* --------------------------------------------------------------- */
    // Enable Starter Content
    /* --------------------------------------------------------------- */
    //'starter-content' => [],

    /* --------------------------------------------------------------- */
    // Enable custom background (since WP 3.4)
    /* --------------------------------------------------------------- */
    //'custom-background'	=> [
    //	'default-color'          => '',
    //	'default-image'          => '',
    //	'wp-head-callback'       => '_custom_background_cb',
    //	'admin-head-callback'    => '',
    //	'admin-preview-callback' => ''
    //],

    /* --------------------------------------------------------------- */
    // Enable custom header (not compatible for versions < WP 3.4)
    /* --------------------------------------------------------------- */
    //'custom-header'	=>	[
    //	'default-image'          => '',
    //	'random-default'         => false,
    //	'width'                  => 0,
    //	'height'                 => 0,
    //	'flex-height'            => false,
    //	'flex-width'             => false,
    //	'default-text-color'     => '',
    //	'header-text'            => true,
    //	'uploads'                => true,
    //	'wp-head-callback'       => '',
    //	'admin-head-callback'    => '',
    //	'admin-preview-callback' => '',
    //]
];
