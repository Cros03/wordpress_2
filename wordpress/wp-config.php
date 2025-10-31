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
define( 'DB_NAME', 'WordPress' );

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
define( 'AUTH_KEY',         '%5qDz-M^FQi}C3#0it|xoB17-*%1lYq~rZ<_NhV6EitW yap0XdOphK<h53U]^7H' );
define( 'SECURE_AUTH_KEY',  '.{~Nv$umDpU(,$8Z6yiGnOj0r$&r@Xu|Q4|L #L|[3[,N4Qn`zMp!M.B{9($.?N5' );
define( 'LOGGED_IN_KEY',    'ncx2%]2%uQ8$p]2rIIp#7|tWJIya~2$C@R`f^U+mohA$s58M h;ig=RgM/Re 5+^' );
define( 'NONCE_KEY',        '>,1MQomuni:V*4m aft7I)8b&C^0Pjv4WTe]edy[3{cN@Pp2O#/#%v9qCj1q3Bm7' );
define( 'AUTH_SALT',        '$=qcGrNTk9vhrS7I^u*Ka7fJnNv*bCadWz?`c+18%V%6koS 8+T>5AoGk@fqxRd:' );
define( 'SECURE_AUTH_SALT', 'cHxV:)_[}|RP[7%UA6MK>HzY,[|#N-2bCv{cmL7t!?M2!7~*t_V2PRDTm6k},7;5' );
define( 'LOGGED_IN_SALT',   'EQ%I,UI =q(k/~mQ)j_s{]zyi`u)#hlOZ1iZL:BE#xo~DhJ]5agjs?G&eYmRISYE' );
define( 'NONCE_SALT',       'nv[[H%]]<cEQi38st8cQOr0Xzm`FfaW|a)^igC. d^;7qX:=7^sTy7SO9}XN[>ye' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
