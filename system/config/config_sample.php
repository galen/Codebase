<?php

/**
 * When duplication to config_sample.php change:
 *
 * DATABASE
 * USERNAME
 * PASSWORD
 * CODE_LOCK_PASSWORD
 */

define( 'DIR_BASE',                 dirname( dirname( __DIR__ ) ) );
define( 'DIR_SYSTEM',               dirname( __DIR__ ) );
define( 'DIR_VIEWS',                DIR_SYSTEM . '/views' );
define( 'DIR_CONTROLLERS',          DIR_SYSTEM . '/controllers' );
define( 'DIR_API',                  DIR_SYSTEM . '/api' );

define( 'DATABASE',                 DIR_SYSTEM . '/database/codebase.sqlite3' );

define( 'URL_BASE',                 dirname( $_SERVER['SCRIPT_NAME'] ) );
define( 'URL_API',                  sprintf(
        'http%s://%s%s/api',
        isset( $_SERVER['HTTPS'] ) && !empty( $_SERVER['HTTPS'] ) ? 's' : '',
        $_SERVER['HTTP_HOST'],
        dirname( $_SERVER['SCRIPT_NAME'] )
    )
);

define( 'USERNAME',                 '' );
define( 'PASSWORD',                 '' );

define( 'CODE_LOCK_PASSWORD',       '' );

define( 'CODE_EDITOR_MAX_WIDTH',    null );

define( 'CODES_PER_PAGE',           5 );
define( 'PAGINATION_VIEWPORT',      2 );