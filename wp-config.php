<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i10897678_hiti1' );

/** Database username */
define( 'DB_USER', 'i10897678_hiti1' );

/** Database password */
define( 'DB_PASSWORD', 'H.XK84x1EIWR3jo8nso76' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '57zuq5eKRZ5V0FY3DoqH1X326trBqWRrbdh01TV0nxgO1fjHPdOsgvwuXyiGdShC');
define('SECURE_AUTH_KEY',  'myOUMNG4PRah5G8COiEMLuuVdMWSqBCGmj1jw4eYeyFeOtScwGZfTa7A1i5fkMOc');
define('LOGGED_IN_KEY',    'uAPjTlkfgXETwMzoWpRSrU40fn5nCwo1uQZfitAoMMox9qeHKonlOwDhMBZ3DjZX');
define('NONCE_KEY',        'ghy9bgo4e1uSMf6FRGUeGVYa7yAldQyERDZtxWJhH5XJbsikaGgR1ulqQg9URVnM');
define('AUTH_SALT',        'lJsqKb8WBDPsPp5mHQMv32hnatwtYTqBZevjCrooC08JwOOEU4XiEyl6UJnA7iqj');
define('SECURE_AUTH_SALT', 'kLMbo5U12OfKPhLLyn0gL2JV3f8diUwArYfagUSQNbibzD9QrnLdqjarimQwYo5y');
define('LOGGED_IN_SALT',   'qtFgHgh4YeGUz2FhaUsuXozUQIxLs0eV7ThhElqndOjoA83FSfF6oem6WLReUZdK');
define('NONCE_SALT',       'Tm4XtN3ogzlZ81o5PrMUWDEbyyfFePFaYvkQtcYhtdmmUEIIQAC6sAHcHTeC3EyT');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'ixhd_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
