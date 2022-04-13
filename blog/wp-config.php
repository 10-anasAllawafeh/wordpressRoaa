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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'LoZsMLvfVcu*vw=$!![Sp]_6L?Z(rxX%Cg)&FDy~RK;m!@u81(7_(r5-m@`[R15S' );
define( 'SECURE_AUTH_KEY',  'oO( t1KaG[O}h+9[OT-BOs-VGr.?6omXl~^>]2I-xq*+BBCccI|7-LX}..|0`_(w' );
define( 'LOGGED_IN_KEY',    '18?ocO~1qb6d`dED2$^:q@z]rWe{fi{DJx%L%%@ChKmnM,Ha :.nkW@8GcQ_gMBB' );
define( 'NONCE_KEY',        '9hZ|`w/aTkmQAsZw*)y94g}&KmlW3]6a{;VHioF)I`-:7<z*~`m7}6jo`F)J`+?-' );
define( 'AUTH_SALT',        'H+p/i`fA0NRd%Q44]1td+dmN%C^TKkxD+DX#GW f~}33Bo [~v*YW<kF6lU2?.sW' );
define( 'SECURE_AUTH_SALT', 'lwD|XgvnCtDWr-O@W*?8)ck=e&OP]*2N.@sOm#@3neY_zDo[ Z%Al|<LVBsB=daK' );
define( 'LOGGED_IN_SALT',   'mRm}foHQSO/jyU<xLwf0|VrPgzv+U#Ds90@1u#Sl6H[0Wn2b%cJnszhIX`HLD9OG' );
define( 'NONCE_SALT',       '%1,xu7zN0HJA494TBM~nn-sbo2jj>qzA(6B??gZdhtw2caF(?/=6E=9r^h}i56N]' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
