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
define('DB_NAME', 'db625753361');

/** MySQL database username */
define('DB_USER', 'dbo625753361');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

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
define('AUTH_KEY',         '=MOEQhR+MVck5dJH?M.__ %1P7EqeJ(5u%ub O-AJ;nt]CH_{l>p;>SInqPk^Xdc');
define('SECURE_AUTH_KEY',  'qF$HT#o1!+h- Md|Pb.L/dn#0j:o7Q|wY5aOvTLci.]gfCe(mTj4~7~a1p$*`%.<');
define('LOGGED_IN_KEY',    'Lu;6.7_Vx[_C]AFJn%h(xR{67v7.2Y+(zp*tCPdg:Zv(ny@h])*}bQBde ;@9ATj');
define('NONCE_KEY',        '3e=b&l F%`&gX`6as!s9jkk>A=:-KGMRbR_|g>)!{25FHJqZ3/fAe#FOw_ ]9UFd');
define('AUTH_SALT',        '$0MR_Tq<km>u/i1u<-)(o)+qjD>N@rtg$-dHh|7jbqpY~pwx+k~h>d8j(v*#E./H');
define('SECURE_AUTH_SALT', 'AXydG?<1nISw2d~]iyOprjc>KfC)nzij}-GZ4Q^}tj^W[*wl*)81dK<EI8P15/Mm');
define('LOGGED_IN_SALT',   'S1rred5uvy?fI%4<V#>g$Vig=>^fC<16j:A#.l@@w3?b`%OQDD&?>M3[IGtFr7e2');
define('NONCE_SALT',       '(IU {)^94/*No391u!v?SxD(uBaWuFz>rjUo|X6lQ5D,v??[vv?I(&<6 &Z)ndj0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
