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
define( 'DB_NAME', 'wordpress1' );

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
define( 'AUTH_KEY',         '-8[xVL_kp#S4hESY0yah<YU+Qm^!^rSd-jTJm`E^SS+H=}602Engd7|i;;|-a^?8' );
define( 'SECURE_AUTH_KEY',  '.$1#)W:k,hf>d46#m/P{B4a%sg470mT%)AQlMRl?E}+NYk#7Zs=K?KlA9^6w/u0@' );
define( 'LOGGED_IN_KEY',    '%Vtt_dhi621AoFy?:3AHAI`]q~bo.h(:Caw:?3a7hp[fT|~>4m*^a!{a^}[*#3oa' );
define( 'NONCE_KEY',        '[IU^S8qwl $|3d<&~d^E@&q|Kt|&vjYVD|/YU+H=6d4M3?]&vCGsQ_g06e]q1wP0' );
define( 'AUTH_SALT',        '#@RYomU:Pgk]a(Q?BNe!)wyti)JZ4!e)VZ1Vr+Ut1XdA#$XrAcTitBm<fq:(@X;m' );
define( 'SECURE_AUTH_SALT', '0&v<90q:&pteAv(w+*9}R 2t&a,Zj:$fKs/l.55thhp9sV|Y#i)!N)=_e?j-TRr/' );
define( 'LOGGED_IN_SALT',   '`bzU(@z7EC]wJY`[QQxQ^P8%vP@QpVs.bE,<;HNfEN>_/pMc> f{c&3`Qq8p|f>z' );
define( 'NONCE_SALT',       '{.YqP1U]n&(>a:?mY2^P@:8K]vX=mT?ngs$vb]5$z[c,:VINc,60xqUz@sGgDL4A' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
