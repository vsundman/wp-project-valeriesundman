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
define('DB_NAME', 'valerie_wp_project');

/** MySQL database username */
define('DB_USER', 'vs_wp_proj');

/** MySQL database password */
define('DB_PASSWORD', 'TnZ6HjWaxzrcJWCd');

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
define('AUTH_KEY',         'F:||(FQM(GbI<&0tC!.iwqf+Ey-Y[vQBx/z%8 .*@W GvX-ykSU?X0bz=Vwu.&F+');
define('SECURE_AUTH_KEY',  '[=0HHbzi?C$[yv,KMCFbzkn|^F|0IzR6.mUo~__!JA9|+4u-Ko:W)gX]8F?5:zni');
define('LOGGED_IN_KEY',    '8=(zqt2[F,n^~^-)fHwp?Tzw}7j5ezXAtr3@z}T7b.s4ITY;*P2H,kA?Sy03-vn~');
define('NONCE_KEY',        'b_2 gg+!x65--HJ~<|Ax)xF#oTRZDCJ|@kH^pqz|y Dev B.3.j`Om9~$?:p!;R?');
define('AUTH_SALT',        'TM,s3w:`+**7Cu.#*Cve#9pDB74+N|X`_ `/#jITxNd,-,|>nA=1(^JFjickER+p');
define('SECURE_AUTH_SALT', 'QN!)y]+c~Y2.T&erOb+8d_,0(J>0})`zNAN<F|rIsq.Mr>/r7}{5-|!8<ao}:$*s');
define('LOGGED_IN_SALT',   'ZC8?zWeh_xqumPoFSdGAw-$ZwD;WKX6mx0Ln5ApHh4H+*,y~@< ,PKf+fLT]no~]');
define('NONCE_SALT',       '-:pvOAx^{m-x+sO|,7{dc4:$;|8L)0$RG9{pOClc{nxRVm-ztViA+ET;6lUVbp^I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'classproject_';

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
