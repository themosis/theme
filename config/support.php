<?php

/**
 * Edit this file in order to add theme support features.
 *
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 */
return [
    /* ----------------------------------------------------------------------------------------------- */
    // Post Thumbnails
    // @see https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    /* ----------------------------------------------------------------------------------------------- */
    'post-thumbnails' => ['post', 'page'],

    /* ----------------------------------------------------------------------------------------------- */
    // Post Formats
    // @see https://developer.wordpress.org/themes/functionality/post-formats/
    /* ----------------------------------------------------------------------------------------------- */
    'post-formats' => [],

    /* ----------------------------------------------------------------------------------------------- */
    // Title Tag
    /* ----------------------------------------------------------------------------------------------- */
    'title-tag',

    /* ----------------------------------------------------------------------------------------------- */
    // HTML 5
    /* ----------------------------------------------------------------------------------------------- */
    'html5' => ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption'],

    /* ----------------------------------------------------------------------------------------------- */
    // Custom logo
    // @see https://developer.wordpress.org/themes/functionality/custom-logo/
    /* ----------------------------------------------------------------------------------------------- */
    'custom-logo' => [
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true
    ],

    /* ----------------------------------------------------------------------------------------------- */
    // Feed Links
    /* ----------------------------------------------------------------------------------------------- */
    'automatic-feed-links',

    /* ----------------------------------------------------------------------------------------------- */
    // Customize Selective Refresh For Widgets
    /* ----------------------------------------------------------------------------------------------- */
    'customize-selective-refresh-widgets',

    /* ----------------------------------------------------------------------------------------------- */
    // Starter Content
    // @see https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
    /* ----------------------------------------------------------------------------------------------- */
    //'starter-content' => [],

    /* ----------------------------------------------------------------------------------------------- */
    // Custom Background
    /* ----------------------------------------------------------------------------------------------- */
    'custom-background' => [
        'default-color' => 'ffffff',
        'default-image' => '',
    //    'wp-head-callback' => '_custom_background_cb',
    //    'admin-head-callback' => '',
    //    'admin-preview-callback' => ''
    ],

    /* ----------------------------------------------------------------------------------------------- */
    // Custom Header
    // @see https://developer.wordpress.org/themes/functionality/custom-headers/
    /* ----------------------------------------------------------------------------------------------- */
    //'custom-header' => [
    //    'default-image' => '',
    //    'random-default' => false,
    //    'width' => 0,
    //    'height' => 0,
    //    'flex-height' => false,
    //    'flex-width' => false,
    //    'default-text-color' => '',
    //    'header-text' => true,
    //    'uploads' => true,
    //    'wp-head-callback' => '',
    //    'admin-head-callback' => '',
    //    'admin-preview-callback' => '',
    //]
];
