<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define( 'DB_NAME', 'dbihbmclzt9hbd' );

/** Database username */
define( 'DB_USER', 'ucrxleseavuz5' );

/** Database password */
define( 'DB_PASSWORD', 'ydu8f3hu9hhg' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'K4BT8-n&;-:P/320{n_}>,G:NGa4X|}WI3F~aTJ}vD rKTcrf(m{U1u,SsF{$IgS');
	define('SECURE_AUTH_KEY',  '6lUw@E:QB+469ut@-ru)vW7^M&KH$~tR;vLaBQ 3q;k<#*DSe4CHq83Qg$kAM/Yi');
	define('LOGGED_IN_KEY',    '5UGvG][-}U.@RGX1}a2i<FjVKx+7 ,R}(lb~#^9)5Jh$,XB/GQkJP%y7Of>pVOVJ');
	define('NONCE_KEY',        '-g7l&Q&|U;$c^BoFK/cL,Q=cfcz=?%R1Z=f$b1pl?AlyNR~>xd!eO1uT+ds:%El|');
	define('AUTH_SALT',        'W@I@w Uft^~E*^*m`E3:SeblJsBAju}=:NWHYH$eS 2Y|jJmtzGk0~be%^&&Y%V_');
	define('SECURE_AUTH_SALT', ' -`S+xzMeD3/0Qc2GkpA]z_8HgPS:07|DJCSM4 rov]H-z3X%BU)Ny+^SOSQfOR3');
	define('LOGGED_IN_SALT',   '*J(;jA#<vg MZn%k`vMpe+@IT-d5SOT4{|Q-YADW[#NAA.72Aj@T^:u{T=$Csr|Z');
	define('NONCE_SALT',       'b=^,I@zq_{YJ=1Tm`1+0f!(P~+qy?wN%gg<|-;[/fZ#%K+Y6vT0vq|8F_6f [^b|');

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
