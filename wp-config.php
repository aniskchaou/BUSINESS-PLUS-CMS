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
define( 'DB_NAME', 'business-plus' );

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
define( 'AUTH_KEY',         '}}D!{ntE84 QPpPOXf7+1,,M9#Aan/g&)gx %qb&R0>8h|n!K+{dic^}n5eY+6nG' );
define( 'SECURE_AUTH_KEY',  'zSwGcsUWVH_mIr,KJdU-VIr.smSuXVtrH jL>hg+>2#p}qTC#<=7!$ka_#6e4gKC' );
define( 'LOGGED_IN_KEY',    'p^Oy/yM3rSsuz4:%$(:7h.AX&Af|5soU1oKc,N|^&pdMR]IMq50;I<8Hvwj(=h7u' );
define( 'NONCE_KEY',        '^1=3|]|=I~m=Mle~R/PA:rHuX/~-$8ljI;z!iaxh@^oRE^w6QpQ4Weq)6doMy`KG' );
define( 'AUTH_SALT',        'JR`{D2O.GT}`5Yr?0}[;[Ja9_8KAU62iy[M$eQ}5p5BCfk=m&=+O1~-HM;f3(vKh' );
define( 'SECURE_AUTH_SALT', '-<LZ}=wF*V`-_9w;Wxm:KDZzJ&_mrtwsg5cxG`4HXi|}apO, |5?1Gu1UxYhX%h$' );
define( 'LOGGED_IN_SALT',   'XrJ(,,RqmY-SdzlFep-2(:kis}$3~4+ZJ~zZYD4Ux.=M|ax8k<cU[H_rC*jIrX2+' );
define( 'NONCE_SALT',       'AZHUN,#~pbP7 %MBhjM=V3ga^n.V<uE>v{[PuganQ30qxZ=,6pR$jF2.0AGHIf}0' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
