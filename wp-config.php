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
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'tozs');

/** MySQL database password */
define('DB_PASSWORD', 'unreal0334');

/** MySQL hostname */
define('DB_HOST', 'sql.tozs.eu');

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
define('AUTH_KEY',         'fOjic3HT2hxui^ptf ,vEU|+E^.e}ZBEqd+Xq&Bol3VdMsBc0%1 n,~$aj&45) #');
define('SECURE_AUTH_KEY',  '-OELRQ_2(iQjm-Q;Sc9hj6!v<tWr+~pSziSRt`6|aWLNIvaN+x&eO@[LhRm6]lpD');
define('LOGGED_IN_KEY',    '1V]3^ (]p^~V<0KY#TyYL|H/+Pq8)b0R+z.|=K9q,.~F?m>qpZ(6!+?a;$usAuBG');
define('NONCE_KEY',        '`y>+?9x3c<nG,4V7!Z3?NP+m87:_eT+4y]cW}`ePyRn0>{NeF]r:YXm_@sQ2txT.');
define('AUTH_SALT',        'nr5i/k`llW*s9l*nvn_^nty@D#A@d*h XP-LCB)^dk>qF+7Ija^lvdG1MV-hp+ y');
define('SECURE_AUTH_SALT', 'Tw-D}O]^@4jR5:+:uFBlB)`!.Hv2uz=u?sBb[A%qQ3wvz:?!~G=/[v*Ho=r~U-~D');
define('LOGGED_IN_SALT',   'pJ-!O6[x.|}R-aEh5pa>kkul[l|m}^zRJa= |y^6.b3L<+bTt<my[9B5B-*4_kSn');
define('NONCE_SALT',       'z$0={4+C|[Qml/OJ7e*omsr-QN@-X% +?+f_r|*zHq=iQpx$@c:]cCs1lQkyg2C`');

/**#@-*/

define('WP_HOME','http://193.182.181.78');
define('WP_SITEURL','http://193.182.181.78');

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
