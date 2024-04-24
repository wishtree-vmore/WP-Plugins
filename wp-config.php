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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demo-plugins' );

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
define( 'AUTH_KEY',         'cv~=W<f[X3~*m81.J;i)>CLd4v^~uITU9APUx_sh/19@E$[Q>Px&%1gt]aSS&H:{' );
define( 'SECURE_AUTH_KEY',  'DF@7wO7,mk&.;USZ$,WffhWbo,]cr2k,/%i:uuCo@n5OWs1?Vt/5q;I%[I!nog_@' );
define( 'LOGGED_IN_KEY',    'Tjn#`Dv}0|!)t?6BG)wdZQ=a(yRW@6.wl~bMv1,`(CJhv[>K{sy66QHk0$>-sFs>' );
define( 'NONCE_KEY',        '(46^.,2V@Y=<dt`h@9/Mk0@/!!#y)|P3f}s9._U-{.:N.X(:UB>-X/)bCIb|VZws' );
define( 'AUTH_SALT',        '}9zqVY`47YD&@,Ndlkv&5T?.eOLRP4hG$Nfzhh-ku*^aRX=5,7,%;-;wU<$E^wf]' );
define( 'SECURE_AUTH_SALT', '3*G4f<WsG$NR$7JdyW?,%#pAA3E$#PO=vj_CJ-c% 5Ej?.F/s*sF/Z2>%<c>wbO>' );
define( 'LOGGED_IN_SALT',   'w{m]aT[36.P*FWpz4|Qz>?,#n14a?l1b  Cp@pbZf<?R4DWp@V%/7J*NL.nBTGuM' );
define( 'NONCE_SALT',       '?4C5H|U_e2`=o/Lc?DsN%Qz#>[1kFQk~oDmud5:SBed0[E/pT`29IN.zji;`5ek4' );

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

define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
