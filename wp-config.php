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
define( 'DB_NAME', 'ki181358_wp320' );

/** MySQL database username */
define( 'DB_USER', 'ki181358_wp320' );

/** MySQL database password */
define( 'DB_PASSWORD', 'SS]3Tj1@p4' );

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
define( 'AUTH_KEY',         'iikk92bllvh7786zmejvlbaoeyplw8o9shmzmytzwuzg3gyj1ixdqlxwmg1jyqhy' );
define( 'SECURE_AUTH_KEY',  'rvpkbg23tihvv99bx2arst4fliicyqiwrjv5hnpzxur3iuqmc6ibcz540976wlci' );
define( 'LOGGED_IN_KEY',    'dqgpqm7fgcwdyldcphauxfq3rldprgmpzr5v7nuy01wjnrbp1oxthorvnj20mtdo' );
define( 'NONCE_KEY',        'dfenznlvv6mhwmjfjxcyooaizlvlsrynwzdphnufltospdxyw0jp6ved7t9fdhsq' );
define( 'AUTH_SALT',        'isrrbnjyjumzhefj0osd3jfeofflpzlfni3fk6xc4pmhkdvxc9hbe7afc9my5ilf' );
define( 'SECURE_AUTH_SALT', 'me8a1dfxpxokye6np1emazky475d3lbloxcioxwyubhoziz74n9wkodaxm7pxm49' );
define( 'LOGGED_IN_SALT',   'v2vsuprdd1uradqz7sh4xftex61w3pjtbku4ott9g0c3nyo1dz65sk93a9zbuw4a' );
define( 'NONCE_SALT',       '9uksjzuodbbukj0k0b8vmzxv2kqd3o8iaprqvdreyl7cqfqawso8lcmzqlvfhlrk' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpbm_';

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
define( 'WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
