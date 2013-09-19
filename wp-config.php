<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Heroku Postgres settings - from Heroku Environment ** //
$db = parse_url($_ENV["DATABASE_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

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
define('AUTH_KEY',         'z,]dhg!}}z?AaJU!8y0M1$m8l7unf-l^U6]=^*~*SB`L]e@S,OU<qn;(SdydCzde');
define('SECURE_AUTH_KEY',  'a]aCCmlylVrc1;Xvp<Yw# ~Wl*k<ke@s;ES[</>mHX_y$eb~T,?um|1Nben(c?xm');
define('LOGGED_IN_KEY',    'J!T~-mni%&6aAD1vZ>*uo,4F:g _{kh30y_`bfzd>QSYIpsV|CoN^k(}lhASRN.d');
define('NONCE_KEY',        'AiEik+)+1<jF)f|DiuRT%Tia5,#V-,%@<<WcCI4xNO+Z*4XqN>=A`pDeyme}Az83');
define('AUTH_SALT',        'Pp@|AJu~rW=p.b1B/|PGnXi24;}Y`D}keiFHhzb3+M(BgJ[|8iQ5jI9NAJo|--w!');
define('SECURE_AUTH_SALT', '7l3Nw&z^s);&.]4q!ON@B!`|vba<LwSx{@SL?~nY_^V|`Wem8eRIEnyb(|_L-}sv');
define('LOGGED_IN_SALT',   'a-.v=!-_HZU{Z#QBq23.y uI4eYGg=eKG8s4F&9H? ~5q>P7(G|OM]pxqWup4+lA');
define('NONCE_SALT',       'H]mqd-B<NYCStCd4#89!+C P76MfZ~;7k~ ND)=}*$4a R)[tH oBjF*oQma}R!c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
