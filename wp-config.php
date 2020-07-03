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
define( 'DB_NAME', 'react-wordpress' );

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
define( 'AUTH_KEY',         'qyFFEYIaAU4Aq9|.]S{SVoZ?uZ@]S,g^JAX(UGi !TgnU;Lr!CJ?;x|2DMkVHcU!' );
define( 'SECURE_AUTH_KEY',  'fKGh&#$z#Eu0U psay;pYNnW1`_lnMZ:{px]N!erI3g8I,P,QR<=-7spzZotMD!5' );
define( 'LOGGED_IN_KEY',    'x(|M%Vs9<+|V(2~rSu3*NZRmbclZzt@,|Ox;lQaHl-LAXRm`buPCV~jxpg2C4mxZ' );
define( 'NONCE_KEY',        'UcJ{k^rm4]1t6*}]^5O6_sPquAlNE]n/RG(a`,DxW ZKc=.tVX^Wgfj=0OtgRDCE' );
define( 'AUTH_SALT',        '6%:QvwXLnTZw:x@D^is2~uM}eR$!Hfb%?]!F{%KGp2s=kpDZCRFYqgBHXzFPHGVO' );
define( 'SECURE_AUTH_SALT', '3a+:3AM{Z*2E1-nhr!jHL7x9[OmXI%eh/6x%z;^PtU+J!pU&u/kt!(/t(1[Z xrw' );
define( 'LOGGED_IN_SALT',   'uGUEMHo<UHf+2mK$Yy-lkJ&`Kn-D2>RP>?vhry+k+`HZ>cn;6U<#ByAS`+[_YWIu' );
define( 'NONCE_SALT',       'b0GCcb! Z>6>Kn3>j>g%H,5gKSPDe_t-.TxIhl@&92G4|:-do`7H&,+WT5Sbb?eX' );

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
