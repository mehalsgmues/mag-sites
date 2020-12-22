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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mehalsgmues' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cqwxcqmo8r01a5h9auhtahfv6jaap6ozyw4mowhloqwile1mwqolongnrh1fbaxj' );
define( 'SECURE_AUTH_KEY',  'd4vvqqgy1bdviuoxgbosfle1p9px8hpewokvq81laoei4tvwk5bbr59flxzgdzt6' );
define( 'LOGGED_IN_KEY',    'uxspyu1ys2cvuzmuipafxaf490tzqnsjjw6abkqvfndkoyxkioqil9brupdybcjv' );
define( 'NONCE_KEY',        'cr8b4pijbxkbm75vmtt0ehw3alryr5d4u7cgw8nf5p0cyabvgi2peittjwojdvrw' );
define( 'AUTH_SALT',        'sduck2vf5fvorjnq9kmc6axudtqdruyvkclyqmidkfshpc0nk8yqml7vchs7vnbt' );
define( 'SECURE_AUTH_SALT', 'caln6sqm3ilqcsu7vgn3pb0tozea22g4rss9g4lj5ogqnhdc6udh9m2r4qhyhl37' );
define( 'LOGGED_IN_SALT',   '3qxb30tkzpcq2wpfgbutczrhnvmw2fyufeiuxvnbdl0wedf83fbqqus6hzbkhkxm' );
define( 'NONCE_SALT',       'ghiptet7cixvje4hpwzghxsd7lorradunkbpqfrrprrvlyqbnwmtetkl8kicvmik' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wprw_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/mehalsgmues/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('DISALLOW_FILE_EDIT', false);

define('COOKIE_DOMAIN', $_SERVER['HTTP_HOST']);



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
