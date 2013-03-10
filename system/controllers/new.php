<?php

$view = '/new.php';
$page = 'new';

if ( $_POST ) {

    try {
        $result = $api->post( URL_API . '/new/', $_POST );
        header( sprintf( "Location: /edit/%s/%s/?new=true", $result->id, string_to_url( $result->name ) ) );
        exit;
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
        $view = '/error.php';
    }

}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );