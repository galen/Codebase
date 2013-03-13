<?php

ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );

if ( !is_readable( 'system/config/config.php' ) ) {
    die( 'Config file not found.' );
}

require( 'system/config/config.php' );

if ( !is_readable( DATABASE ) || !is_writable( DATABASE ) ) {
    die( 'You must make your database readable/writable by the webserver.' );
}

require( DIR_SYSTEM . '/lib/helpers.php' );

require( 'system/vendor/autoload.php' );
$app = new \Slim\Slim();

// Every page consumes the API
require( DIR_SYSTEM . '/lib/Curl.php' );
require( DIR_SYSTEM . '/lib/Api.php' );
require( DIR_SYSTEM . '/lib/ApiResult.php' );

$curl = new Curl;

if ( USERNAME !== '' && PASSWORD !== '' ) {
    $app->add( new \Slim\Extras\Middleware\HttpBasicAuth( USERNAME, PASSWORD ) );
    $curl->setOption( CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
    $curl->setOption( CURLOPT_USERPWD, sprintf( "%s:%s", USERNAME, PASSWORD ) );
}

$api = new Api( $curl );

// Require languages
require( DIR_SYSTEM . '/config/languages.php' );

require( DIR_SYSTEM . '/config/routes.php' );

$app->run();