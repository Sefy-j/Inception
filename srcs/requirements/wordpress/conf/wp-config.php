<?php
define( 'DB_NAME', getenv('WP_DB_NAME') );
define( 'DB_USER', getenv('MADB_USER') );
define( 'DB_PASSWORD', getenv('MADB_PASSW') );
define( 'DB_HOST', 'mariadb:3306');

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'WP_REDIS_HOST', 'redis' );
define( 'WP_REDIS_PREFIX', getenv('WP_DB_NAME') );

define( 'AUTH_KEY',         getenv('AUTH_KEY') );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY') );
define( 'NONCE_KEY',        getenv('NONCE_KEY') );
define( 'AUTH_SALT',        getenv('AUTH_SALT') );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT') );
define( 'NONCE_SALT',       getenv('NONCE_SALT') );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
