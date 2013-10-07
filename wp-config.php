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
define('DB_NAME', 'pavillion95');

/** MySQL database username */
define('DB_USER', 'pavillion95');

/** MySQL database password */
define('DB_PASSWORD', 'pisangkeju');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ' lDGLh3dl:D]3Efy!dFN+1t,lD+yeh#J<un<+ea8?T59 W9xV|>_A#:!QiK~bw63');
define('SECURE_AUTH_KEY',  '2]?./~!8PB^N-X$@0:/Nf*v|-GO/T7;~4zMLg7dKAYH:9C=YcCj`?5CaRqQ1mH-K');
define('LOGGED_IN_KEY',    'k7G$;r$g(@e{#a EEeNZan#z]TL3}eGuS;T|D}Ut-k%oByHWx46ue//VX/02)ujw');
define('NONCE_KEY',        '!@=O2*_,|?fSIgt=eB(<R0O1K,Ogd>1zhRI_p0uNL,IM+<xB9OR?;/ymdRXB9#Z4');
define('AUTH_SALT',        'Ml9*P74 -&y!gjuU@ YrAzeNcMdH{eq?nb|f-tQ<)*dYrD/DC|4Xj^HvwP43Xw|g');
define('SECURE_AUTH_SALT', 'pN:_`o8s>$<uX,Bf_}v~m,amKX+1?ZjLUrP7/w5RB[M{C.K$K}E4crk4pljRe!/6');
define('LOGGED_IN_SALT',   'RoGE)R!x*fc|B;F7z=B+fdT|b=m`GwfUkMa&%M YXJ>>%Lhb`K]u@6##DgUdRMOR');
define('NONCE_SALT',       'JZ@GQk,J#&#^3$F/4W[MsrR|$F$W2;2+fG8.2dSEkfl @ye&R8H#a=aTj|p!%6p,');

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
