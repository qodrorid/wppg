<?php
defined( 'ABSPATH' ) or die();

/**
 * @package PostgreSQL_For_Wordpress
 * @version $Id$
 * @author	Hawk__, www.hawkix.net
 */

/**
* This file does all the initialisation tasks
*/

// Logs are put in the pg4wp directory
define( 'PG4WP_LOG', PG4WP_ROOT.'/logs/');
// Check if the logs directory is needed and exists or create it if possible
if( (PG4WP_DEBUG || PG4WP_LOG_ERRORS) &&
	!file_exists( PG4WP_LOG) &&
	is_writable(dirname( PG4WP_LOG)))
	mkdir( PG4WP_LOG);

// Load the driver defined in 'db.php'
require_once( PG4WP_ROOT.'/driver_'.DB_DRIVER.'.php');

function wppg_error_handle($errno, $errstr, $errfile, $errline) {
    if( false === strpos($errstr, 'pg_query') ){
	    // echo "<b>Custom error:</b> [$errno] $errstr<br>";
	    // echo " Error on line $errline in $errfile<br>";
    }
}
// hide error before installation
set_error_handler("wppg_error_handle");

require_once( PG4WP_ROOT.'/wpdb2.php');
if (! isset($wpdb)){
	$wpdb = new wppg_db( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
}

// show error after installation
require_once(ABSPATH.'/wp-includes/cache.php');
wp_cache_init();
if( is_blog_installed() ){
	set_error_handler("wppg_error_handle", 0);
}
