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
define( 'DB_NAME', 'blog' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         ']BFyvG6Pez2O-.i-pJ$mvg&$zR5-c_SP^JBRPm]<rmmLAc(v&sEL9hi;c(K!kgRK' );
define( 'SECURE_AUTH_KEY',  'l!g=L!:fKH-KR2r.irC)0%02`T4LpE)~CI{=2-vWn/f5ZMyz>DUTBNw.15;xelCo' );
define( 'LOGGED_IN_KEY',    'O!aL{FXp:7[Cm5E4:}O!DlhsQH7nH+eV2tuGX.`lBwh[N^tepSV=3*/X)1|:^[_x' );
define( 'NONCE_KEY',        'P7`r$f&3G@@C>=*??0[~huC$`tkU{?!;w3%au- @J4u]~EnaU`;cE3IIklj5.Vl#' );
define( 'AUTH_SALT',        'X >*5]u@tts~T6_4]r|?A}{!H&/K.w7}<{B%Ia>Q(H;Kckr;mF03rHFq%$$V#AM;' );
define( 'SECURE_AUTH_SALT', '?3Bi`*zG+F#nq;4d]R7UYe@Gs_|M=1 udP<9!C?^0&=_|V.3Hpae- 2fSjSeq3h ' );
define( 'LOGGED_IN_SALT',   'K8Qb7+w=Wl?_Bc(VWL >e}B=@ 1~-e|hPvgVh0%{h>FAuxcK;CHE=Vtc63d@rELJ' );
define( 'NONCE_SALT',       'g8 @|[_]/c+fN-w#+4zYu)<%yU<?ukLKiFMIQofUzFd_9{z6$~HF0qiH$*]zxGEm' );

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
