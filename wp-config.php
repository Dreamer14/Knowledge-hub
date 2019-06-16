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
define( 'DB_NAME', 'knowledge_hub' );

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
define( 'AUTH_KEY',         'Obg@C)F~ooGYqN[pmLafA0 xc),9sr</Y|<0?KOwi@d.sm2}=3XzH^hJiGU,fd0t' );
define( 'SECURE_AUTH_KEY',  'G~l.:41a&J(mEt1~Hz`{a?Cd}(d!!-EQ<P.AKE.CZ!5KDM6Hnk`GP4`D*eUS=#&K' );
define( 'LOGGED_IN_KEY',    '0WK  _a`|I2/%56=i>}5?|cu&t;Dhp,(8o]vq_q;s]e0cG{Q]*-mIkfBhFyFSr/8' );
define( 'NONCE_KEY',        '-r #_ePrsQW6f>f(m_oEFh|R/p[fF9`(sZ|ZnY,@y&cI@HUEg22Y=@oY 72Mg*5+' );
define( 'AUTH_SALT',        '<8?= GH*19fYS]<~Z,O874JRlHd-@,,cvh5=p:?vBAi_tvsa%_B~=&e$d$6G/CZy' );
define( 'SECURE_AUTH_SALT', 'vGa$ZKr&}7Q+Kgl#jK:aJuc|l^~y@Fd[49;8~*`mz`m7gD|sNWZ[n@]dLr=rE/WI' );
define( 'LOGGED_IN_SALT',   'H38v`&O|ar[a51s d1SAz*:K=T!tHV]z9^5!+MQ1&VeA~uPy&M8ATVxRlv1VhF)$' );
define( 'NONCE_SALT',       'oxyiDhb=_/`xt~?M/PPS-mZ0CNNC*U1o$?AnThtyD[Bu`^FZ[Dh%PZcuEv5?=.>y' );

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
