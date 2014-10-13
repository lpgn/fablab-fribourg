<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db-name');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Site URL */
define('WP_HOME','main-url');
define('WP_SITEURL','main-url/wordpress');

/** wp-content location */
define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'].'/src' );
define('WP_CONTENT_URL', WP_HOME.'/src');



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=FT>+O+KGX!iHvWau[Woib-Vw|3l#OsAy7%C(v{x{^zVrj;:Zc^4!5E39z|=N*`N');
define('SECURE_AUTH_KEY',  'f%QCnl_+ln&hQTCw[87c&@ZSDXy$5|6-*[RE<e}@%MdmH(O7eWP&Lc[*+ZkH+f4g');
define('LOGGED_IN_KEY',    '-vES- n4cMw}Fl]Y_Dw89&;}GgioGBBZ7Eh-_a[?Y-thDQaHyrrt>pQfw>2isZJu');
define('NONCE_KEY',        'CrL/GJmfAb&tZNv|:h=Dh#T ~?sr!!#[OW$Tyc-63+$B_d+|4tqe_yzf&CP|{RQU');
define('AUTH_SALT',        'AypvqY(6Y b]^dC9>2v.wNa0$,1ETNonv8ZhuX}Ro#x!)yn,U[K{~NVg#*y0|_K9');
define('SECURE_AUTH_SALT', 'ZRtSjEVe8]=yrXOE->KA=k$Ffe.5;jk7j-ngD_z%;Dr&ah-v0T;.|9RZ vc1x-fH');
define('LOGGED_IN_SALT',   '3#J|1~ylK^f:zv?)amMDn_0@@;2mI1zS-+/V<oZSXx[{x<;$.f8GZCVtY|73W/u]');
define('NONCE_SALT',       '9l_1B<5l??eQ&(lj{fq@UQ`HZu+)uwwI}oW<:m=}z]:*[Xd^iH`H,BEYg-f$yP<|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
