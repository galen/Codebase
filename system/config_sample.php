<?php

define( 'DIR_BASE',             dirname( __DIR__ ) );
define( 'DIR_SYSTEM',           __DIR__ );
define( 'DIR_VIEWS',            DIR_SYSTEM . '/views' );
define( 'DIR_CONTROLLERS',      DIR_SYSTEM . '/controllers' );
define( 'DIR_API',              DIR_SYSTEM . '/api' );

define( 'DATABASE',             DIR_SYSTEM . '/database/codebase.sqlite3' );

define( 'URL_BASE',             dirname( $_SERVER['SCRIPT_NAME'] ) );
define( 'URL_API',              '' );

define( 'USERNAME',             '' );
define( 'PASSWORD',             '' );

define( 'CODE_LOCK_PASSWORD',   '' );

define( 'CODES_PER_PAGE',       5 );
define( 'PAGINATION_VIEWPORT',  2 );


//array off css files and 1 mode 
$languages = array(
    'markdown' => array(
        'mode' => 'markdown',
        'name' => 'Markdown',
        'depends' => array(
            'xml'
        ),
        'mime' => 'text/x-markdown'
    ),
    'php' => array(
        'mode' => 'php',
        'name' => 'PHP',
        'depends' => array(
            'htmlmixed',
            'xml',
            'javascript',
            'css',
            'clike'
        ),
        'mime' => 'text/x-php'
    ),
    'phpwithhtml' => array(
        'mode' => 'php',
        'name' => 'PHP with HTML',
        'depends' => array(
            'htmlmixed',
            'xml',
            'javascript',
            'css',
            'clike'
        ),
        'mime' => 'application/x-httpd-php'
    )
);