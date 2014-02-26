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
define('DB_NAME', 'innomiyi_apsoma');

/** MySQL database username */
define('DB_USER', 'innomiyi_apsoma');

/** MySQL database password */
define('DB_PASSWORD', 'P1-2]oS6nf');

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
define('AUTH_KEY',         'mwszm4lcgg6w90f73jp2ctvsq67tjbjqelbnooazwikt1ytj9csvmyvwvoy725jx');
define('SECURE_AUTH_KEY',  'uzfhfospqzqkyoldyty3a3vldn0wfwj3jmxw1vigcznoyaa0woyngmjphndqyn8i');
define('LOGGED_IN_KEY',    't7ktavlpzbhuj0cyb92xko90abgaejrieix7zawjcalbthvh5fsfdkfva46lk2e9');
define('NONCE_KEY',        '34misekiazyi2nd864u6fcjd26osetb4ezo5dpjzbmfdd9vorredmv4sgcdnwaky');
define('AUTH_SALT',        'gby2y762hhdbujvqmya5imewq6wrkqocsjh9ulgstkvyx8hra5pad7tzqfornjvt');
define('SECURE_AUTH_SALT', 'e6bnip4r7qclmrdvmpyucb6wp2rs5a3myxpcjfuriumrdtfah83iezp76vxoi6ow');
define('LOGGED_IN_SALT',   'jfxrzsmhhfjrzabgmfqc8nsakfaanfogldxbiurrdbr5mjnkhhyf7c4orqhjvbnu');
define('NONCE_SALT',       'xclhju0lj2cchdpxwg7ngjkqfc1gps4ymygnpnkqbqloa4ne1dkm4rwlsbyc1fjt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'appsoma_';

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
