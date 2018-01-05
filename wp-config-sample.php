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
define('DB_NAME', 'pollutio_pollutionsolution');

/** MySQL database username */
define('DB_USER', 'pollutio_sumon');

/** MySQL database password */
define('DB_PASSWORD', 'Sumon@87625');

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
define('AUTH_KEY',         'WsP1_7N(`E/)sZ{~<lxsz73PZ!w8)m&?q@=;}KzEb:W(c+z?>!(l{iXQU|=~Kt6v');
define('SECURE_AUTH_KEY',  'x{U(KLDaM7nR4a_&!(_$N2~,>bOERMWU[r#x4wYg0=u;pseqzj|?UY=*k-`w72]z');
define('LOGGED_IN_KEY',    'sHh:Fz0Se2]`[Y-z2du/^WfQJwt#;6}5Yd(B.(FAkv:EDMZlyZ_6~h{6)/04~xKs');
define('NONCE_KEY',        ' # j{!m!Az6nS:)6Kg^V:Q2JAuYYXwRAg*~yUk050@0Ve=&cxUR6*H~,Rnx;=[cA');
define('AUTH_SALT',        'ox}$SbE#eKI<S*NGQ9CE+mE_=+1W_QOs<ZX)7J%!2=7C5E/Y=%Hglk[`Djf-Vfa0');
define('SECURE_AUTH_SALT', '4u(q><xNFaV[c!T~Cz*qg5i:3x39~=qFDd-CR Rn6[,4I#~&vX1c*6s.[,g{K|>!');
define('LOGGED_IN_SALT',   '_21BhfhYeD]t_.Cv$]Cr*2J#q.w(pHzq@vKVwS1vglOF7CY-gz<mn@L^*iU^5rA:');
define('NONCE_SALT',       'A M17OQ=3yvvSQTc,z#-GNcLZ/4+&hfD/X8cK3)t%>vrEow]W^Ka99cC0#b,T=*:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'psb_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
