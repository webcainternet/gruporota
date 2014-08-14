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
define('DB_NAME', 'gruporota');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '|G$s,+-O!5[pZfbhyJ>a|cPD: 8^j=5d-ldXOZIit>!EP3di[0>G5HR-CsTfp&4`');
define('SECURE_AUTH_KEY',  ',Q Q.#jsLrur)L *Amr4pSytqB}>&Ie{2OhsWe7:v@|(<kzVWrN?-B=|gvA{%QZa');
define('LOGGED_IN_KEY',    'wWEdj~;V{r5gCYCc3H<`)p$W}|PFao,S@+8.S$&=kL4+|>5-GB}/w?^3rX_^9Qs|');
define('NONCE_KEY',        'VU{B.$Qx1|>|8;7u;m2k=CV%M||^h-2ljfV:u`Oh.j$s7w))e3?-u8.!6SDT7(B|');
define('AUTH_SALT',        'Um)`Z|~{R|o|?Dd8G5ARFb^fiN-j#8mMol:b9|}>&,b63M;@aGn^n|Yyl2~$*pin');
define('SECURE_AUTH_SALT', 'X[/nas1CCw?*+GfS@;&Lh)a7`Rc!!c{MWoUUqFE*[)-Nqiyxz#OPw2]?qEzy?<xO');
define('LOGGED_IN_SALT',   'oC.N8VxM7!,q!3OU6d@~@TB%A)n++|$&4@Ose& >9yMqAN|IOAcG<Y+T53aY{vS9');
define('NONCE_SALT',       'I#Td<()=%_:XN$M!$@YG>&LG`+M[]&0RMb8JJY(|Su=*C 1;:;Dr#Qi{ma7hOTp?');

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

define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'gruporota.homolog.webca.com.br');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
