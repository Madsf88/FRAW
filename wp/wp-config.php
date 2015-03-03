<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'W94g-U^-Lv!+;x`_Ykyf[2DBjirVs0O]=4F^hrN+vUjby,[^=Z|DX0*+ `#j3eP-');
define('SECURE_AUTH_KEY',  '-NjA<a/<lz.sb0KMB{|yA6PW(tgMm;>~yKn$`0]+**m~yZmXW(9)6|^<CbY, i$H');
define('LOGGED_IN_KEY',    '!@%vXjz-Ww!bNddeK@nGzE~]C&&<|Mk~-wx#I;n!qdMXqCyS.-K]!+y>@?],/?P4');
define('NONCE_KEY',        'bvN{FWx@~v%=#ZZkn QX(1zxqfWV{G9IvftN-ld0`G}9Vc-${H^liNB`/iNIw0IQ');
define('AUTH_SALT',        'TS7e2ofko?2rT:VK#y2H+``FB@rSwpA-@MH9p*-TU3-m=`4aGGF0W+GR{+#rmYB$');
define('SECURE_AUTH_SALT', '_)Fx5yw[4n2.6TJ2xr[;Ve%>WhT#18d,p+h nFn-P]M6 :0EX/OQ#Qo;^;Ef70Vx');
define('LOGGED_IN_SALT',   'f6v6oyO6B8c|cC,<sDW`EomCY$Y;^|X+}A-;MaB<f>|+7|_god+gyCV~AB]RA)k|');
define('NONCE_SALT',       '06+{(;l}m+PmZ}RW/L=l1RKQy)O/~6)(BA%E|1y nWW0|4]R[(?n7(+s+s_E:<!i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
