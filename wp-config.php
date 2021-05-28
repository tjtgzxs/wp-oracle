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
define( 'DB_NAME', '12914646214_80_817' );

/** MySQL database username */
define( 'DB_USER', 'f9bf8f4b' );

/** MySQL database password */
define( 'DB_PASSWORD', '898a7bee' );

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
define( 'AUTH_KEY',         '8z9zeCrFfvl.+0[4 CaA-G^0.1o(`{<)w45]aEz8<Rfy=6eL*?*h|qvh~@hSM==0' );
define( 'SECURE_AUTH_KEY',  'Z.v{<oY{i2B,MeLjeN& 90B]|rsGE;S`35,l|s$1@[D[@140jiKNffwQTD*!B6~_' );
define( 'LOGGED_IN_KEY',    'fAWI(x$K_u3? x`>84g0EPns9/bPHsWkRL_vpO*&eBqYPss%k~$,tx zJl;!Wx<M' );
define( 'NONCE_KEY',        'o#ky_As,(XxP&O,;~dBCBf<yT?%;/TBF{ 2cy~Fo*GN@tZHC};IBqf.AOIAEjf%Y' );
define( 'AUTH_SALT',        ')W7gDo7X0+CutR_$?|SKUQ`uu1Vlu/DLiI-;DPn_~:nLjcL;{7TmM2CN<>+$OEn?' );
define( 'SECURE_AUTH_SALT', 'ad^vhU4((xEUsUP(LKVp8?XuhlsjpKSF;j+1d>?<-9s,Xr@O*YPgaP[}iH4ry;CM' );
define( 'LOGGED_IN_SALT',   '/*y];@h{N]Y21V%AhSH|%.y;gc9Qks7,}Wa(M~ b)os5p]k{Q:90CZqJv@3s`t4?' );
define( 'NONCE_SALT',       'Gv wk!7d!:)|Ws^QX@Si[NTq6~jg|n]lfm*GF/H%1K{s:uqzbc*L3:<VJCrX(rPM' );

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
