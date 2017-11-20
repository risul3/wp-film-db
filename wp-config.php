<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rmdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']H^v4qw/@UabT8]{YEy!0$8ee)n:2?pb1llzC[,y:_vST~,[I;-QV=NHdkOAmY9N');
define('SECURE_AUTH_KEY',  '}NF/Qk|-bSBX]Wtle,|kL!A1L{,E;uW8>aW&|vb :P;}`J`]Z>t9ev6~3*aEk)4E');
define('LOGGED_IN_KEY',    'ap%c@YDi`AL7zv,gC07>kzGo~{{{COicwb77,|=}^^nwNEoC9G(rGL3:9I9Qm1Ez');
define('NONCE_KEY',        'gr/Mi)v>k0b/%M>n=0Aw&1),C/(%>N?TUhJjO>[(D>SilTF:s;ZLW*y(7NhMMrmU');
define('AUTH_SALT',        '0|DLzdz26Ax)=EIL {rWc7W5v!*/^,f/K*0V`ZDoQX#]vh>8cYjwrL517|L8X@Z?');
define('SECURE_AUTH_SALT', '?B_o9/TS|I7;h8Gt`~39$2U,]JKz()`+N/611}M$T@{YA*;G1-cCL$7+m!e<56kw');
define('LOGGED_IN_SALT',   ';a/!<@vIciYm|U=J![fooYc7]GB+`O2K`y&~(VUpsP!(w3`y/7]JfzMQs3V`sfo:');
define('NONCE_SALT',       'KezV/6y >3Nk zLy DmCU]Bl1S0<#=NuPX, ZXMkBZPr L}bB>]h!CulCW$Mfe)y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
