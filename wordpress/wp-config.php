<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'j2t]/l>NY?F*j+xz98mqV~1[0P0|Y!7fC/c*{#$o&_QJ6Za6hmEp||Hhj%l754{4' );
define( 'SECURE_AUTH_KEY',  ']!ttD$5=!i$O,f~?,>h]09L0Y^U8)?4!C<aF==z}`d_`wupsuKZNZnjSOc+tP7d9' );
define( 'LOGGED_IN_KEY',    '{>(5kFwIh7oNK@Ax,$=;V{5IB0|wo$$kwW3(>11<y:]H3RX{ip{h`p9%LAr;+s<Y' );
define( 'NONCE_KEY',        ']&P)}5*Fx,mJq(IrPrB*}-43+p2NT&Y)Q6!VQ9>/&9ur=$m;)$byq[~/e:C~qR%v' );
define( 'AUTH_SALT',        'B{Q_Op=khbBp_7S{Q%4{,43=Ehuokj]=js)9`%;$.LCBLajKXQaP/UMr&S=-I^MN' );
define( 'SECURE_AUTH_SALT', '&T%T!98XeO)hvR(~fnzd;<Cg!6ZkL,SO~a$E1yMVNu?W80iso>iMv} XCOe#tJvI' );
define( 'LOGGED_IN_SALT',   'HObb.E^c=>^MKNjNC)&kHdjaq]z=Uma1oX~AL^i>:f_>_JAHS%NR3C3,XOT`{;Nx' );
define( 'NONCE_SALT',       'xLo0__a;0K;dD7a;+0yT^[9TH:J/xq.XQi=wi}sy^,1R4@1PeV.a{.>Z@mc6 nO3' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
