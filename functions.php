<?php

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 300 );

// Define directory constants
define ('THESIS_LIB', TEMPLATEPATH . '/lib');
define ('THESIS_ADMIN', THESIS_LIB . '/admin');
define ('THESIS_CLASSES', THESIS_LIB . '/classes');
define ('THESIS_FUNCTIONS', THESIS_LIB . '/functions');
define ('THESIS_STYLESHEETS', THESIS_LIB . '/stylesheets');
define ('THESIS_MODS', TEMPLATEPATH . '/mods');
define ('THESIS_CUSTOM', TEMPLATEPATH . '/custom');
define ('THESIS_ROTATOR', TEMPLATEPATH . '/rotator');


// Define folder constants
define ('THESIS_STYLESHEETS_FOLDER', get_bloginfo('template_url') . '/lib/stylesheets');
define ('THESIS_JS_FOLDER', get_bloginfo('template_url') . '/lib/js');
define ('THESIS_CUSTOM_FOLDER', get_bloginfo('template_url') . '/custom');
define ('THESIS_ROTATOR_FOLDER', get_bloginfo('template_url') . '/rotator');


// Load classes
require_once (THESIS_CLASSES . '/options.php');


// Load admin file for Thesis Options panel
require_once (THESIS_ADMIN . '/admin.php');


// Load abstracted function files
require_once (THESIS_FUNCTIONS . '/hooks.php');
require_once (THESIS_FUNCTIONS . '/comment_functions.php');
require_once (THESIS_FUNCTIONS . '/content_functions.php');
require_once (THESIS_FUNCTIONS . '/deprecated_functions.php');
require_once (THESIS_FUNCTIONS . '/footer_functions.php');
require_once (THESIS_FUNCTIONS . '/header_functions.php');
require_once (THESIS_FUNCTIONS . '/multimedia_box_functions.php');
require_once (THESIS_FUNCTIONS . '/sidebar_functions.php');
require_once (THESIS_FUNCTIONS . '/tag_functions.php');
require_once (THESIS_FUNCTIONS . '/widget_functions.php');


// If a custom functions file exists, load it!
if (file_exists(THESIS_CUSTOM . '/custom_functions.php'))
  include (THESIS_CUSTOM . '/custom_functions.php');


// Launch Thesis within WordPress
require_once (THESIS_LIB . '/launch.php');
  
  // nav menu added by aditya
  function register_my_menus() 
  {
    register_nav_menus( array( 'header-menu' => __( 'Header Menu' ) ) );
  }
  add_action( 'init', 'register_my_menus' );  