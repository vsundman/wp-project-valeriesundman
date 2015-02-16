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
if( $_SERVER['HTTP_HOST'] == 'localhost' ):
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'valerie_wp_project');

/** MySQL database username */
define('DB_USER', 'vs_wp_proj');

/** MySQL database password */
define('DB_PASSWORD', 'TnZ6HjWaxzrcJWCd');

else:
define('DB_NAME', 'vsundman_audio');
define('DB_USER', 'vsundman_audio');
define('DB_PASSWORD', 'h$l&=W!LvdP2');
endif;

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
define('AUTH_KEY',         'iknjP]1o& -xx-^+*>:G,0a$^Y|(KjwY>z)7t3e1{SGXIXUO@_Ril4SsGB,dkrY0');
define('SECURE_AUTH_KEY',  '&6=JATw-`HN+bb%H(&?]Kt2R6]S68TA;yf v<Ik{|e]EZ}><Be)!Zl:qfsF3Aw~b');
define('LOGGED_IN_KEY',    'is=tY9v]P3Dx.c70cH%GwqsJXK+v~J=w(cZL/?Omm*Ue6XzaMfI|ddm}mrVCPcYn');
define('NONCE_KEY',        'f50Ud=$TzDY6+<h!B1.T@a5s`A^sX!Ab~v;$L=JT*iJYgK{W_~[iw=.uiDk(9kSu');
define('AUTH_SALT',        'DJ)X] C+|]BJR~jf##&OG7j.4Ln1=gl2VW#W?(?q]^Pa0+xBbA{yO&{E<X;sEUD3');
define('SECURE_AUTH_SALT', '9jB1+s-<xl-,)?(|EkJ}|cq]4.5xs;^-;2*g T)^8-lJm$uVt67V@>e[@dNtU:p?');
define('LOGGED_IN_SALT',   's]@ID+4|dcizFx[L$iU|yP=BN;Q[|`kY{q)~+Cmv#MAfvUguR!laq~Hk&s++kNRJ');
define('NONCE_SALT',       'vK9SV7TbdLle:H )a-b`ls&W{0d*LC`T~,AJ-v+YG2KZj%A%~(RmHhg4W&49QQsy');

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
