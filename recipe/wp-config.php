<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cookingpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CRfW$&L`fT0n.0@JGc/D7)aJ}~i;Tc,(o7B.oz!-X?Eba8OV-QHtnWBHvIcGk06c');
define('SECURE_AUTH_KEY',  'VKh1i8CpDKd+++&%ML^(W?V,~VT,aj[>g-^S.oWqas)b,]wkzl@|06)65;+r%Q>&');
define('LOGGED_IN_KEY',    'jJ?1c]i$/B+<|yP8Y|P> syNa+xS::NToW[Tv?6NP-I$O%(K&[u3o|7docZWLO.*');
define('NONCE_KEY',        'psw0XQK_o|{Pp~jvotVaHs|b+{gCAAXZy#+|t*hc)}of_+UtNT,J-9$jXLAA_H<C');
define('AUTH_SALT',        '}6ncYO?,[umls1lb5G0kk1ya41p/V3%k|tNB`0j{sxuL-8+a``1j}LkH`0l tT^-');
define('SECURE_AUTH_SALT', 'SxzS00Lj~V/RFo*MgD+4J[ E-391,Ti!uRHMt!XI~BwmE)^UBFHF{dh;oq/DR#Z0');
define('LOGGED_IN_SALT',   '@*JHupO-DvL#Th7-+wBcs2BcZ7+JeoA$s$!S+9s])E<9XV9EGxhx-v,-mtqEq@Zk');
define('NONCE_SALT',       't~^Tt*Ta,M~/n1^xP&z{J^Yb>8|e2++4>/k@Li+g2C^;FTeuB.@(&(Rl89.Hp~V3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
