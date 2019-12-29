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
define( 'DB_NAME', 'Ecommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'bs,qE| ,nA+/%I8,D_7u)gVO]bJ4I1rAW*q<~+sOMspgyLe}0$~ sX>X?Jq^_wtU' );
define( 'SECURE_AUTH_KEY',  'An,`_.>(p!4wj1q9ip!p,3eTXDFfp,^RMBPIos1w{S,*DzfoCcaij;h<iI+q*pUJ' );
define( 'LOGGED_IN_KEY',    '%&Vsv#etYM0Y:@m{Ynjt/%U@[n1dMQb,1fN6R7]c8)u<z2+6o5})UzFRUzL0/;(@' );
define( 'NONCE_KEY',        'N`T;rkB rgCv0LWax3$0#0[O ;u;A_g%b&ZU%Lm@9[6sagt{l?WT.<>(BIfM!+av' );
define( 'AUTH_SALT',        ';d5nwqnOha;<lz_5<<i~sBD5mF]ds&!*?g!A|1+FeHO~s~p#;2,xQT^T|*C~k>dF' );
define( 'SECURE_AUTH_SALT', 'O8&0`f,B.RgkS%-!xrVN uaY*&{unMl-noP+D/6E=UIXy;^u>^%K1#7fS&84BhWg' );
define( 'LOGGED_IN_SALT',   'uF^}kn.<aGSBzo5Y*ntR`f,C[ 9mR2$uUp}gsRhl]L6ffTYkNiHp|UjudD_#GmVe' );
define( 'NONCE_SALT',       '<JuRDP |c+wjy!.VpA0,Qr=uU{TO_G8#av$-(7kSE1f]{:q[rN!$d^r$n{s0Sby^' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
