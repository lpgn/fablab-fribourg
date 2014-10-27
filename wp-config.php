<?php
/**
 * The base configurations of the WordPress.
 *
 * @package WordPress
 */

require_once( dirname( __FILE__ ) . '/environment-config.php' );

define( 'WP_CONTENT_DIR',       dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL',       'http://' . $_SERVER['HTTP_HOST'] . '/content' );
define( 'WPLANG',               'fr_FR' );

define( 'DISALLOW_FILE_MODS',   true );

// Multisite
/*
define( 'WP_ALLOW_MULTISITE',   true );
define( 'MULTISITE',            true );
define( 'SUBDOMAIN_INSTALL',    true );
define( 'DOMAIN_CURRENT_SITE',  'example.org' );
define( 'PATH_CURRENT_SITE',    '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
*/

if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

require_once( ABSPATH . 'wp-settings.php' );