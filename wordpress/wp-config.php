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
define( 'DB_NAME', 'wordpress_db_gallery' );

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
define( 'AUTH_KEY',         '*Y5q1+s0)^ZK?Ok8V%&C=Ke3zE^#gxg-:B&lcOMr?gC~K-Ik]kz:W)7-X@Zo`o!}' );
define( 'SECURE_AUTH_KEY',  'x=z?-5UDH$kWXc$jF)=$33OqNTc-R{qU^2{LpcB/[`DjRa Xj9t/G+{q4vxeDa!>' );
define( 'LOGGED_IN_KEY',    'GxPQ&l^ #VQ;r;@^_bX.vwDZ`B@)hg} 8H>]7*6Rt/<6Ry`ucCSzzclC1Bz|Npj@' );
define( 'NONCE_KEY',        'AFIKGY$-bpP(.{OHesew],l>;r6|IZJl)3-J.`iqu?-Te A;5c6n`}-ll*y6`,-(' );
define( 'AUTH_SALT',        'b17;+%.nyGAZ5Y=;F;u.MK_j[p])TL:bchT=+O2.3TLaW5K^NLCgWNrjRcypay5{' );
define( 'SECURE_AUTH_SALT', 'bgl+6M}AXZD)BGgcu*&nHUOVruT>WkhP`}NFGhDzkG$;.GGH?.vJ5-jHW3|(m*PD' );
define( 'LOGGED_IN_SALT',   '8%KPIGUV)G(::T g)roZ/Y62UK_?e@ps[FS]n@Yypc3w!~a2RdF[.}JYg=r ^|8*' );
define( 'NONCE_SALT',       'aE+WoPjOV(^*J_TGp> 4r$-cc0LLCnKZL6A<-P%.I:Y>^22q$`G}TUj9Uv1z6uFN' );

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
