<?php

if ( $_POST ) {

    try {
        $result = $api->post( URL_API . '/new/', $_POST );
        header( sprintf( "Location: %s/code/%s/%s/?new=true", URL_BASE, $result->id, string_to_url( $result->name ) ) );
        exit;
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
        $code_data = (object)$_POST;
    }

}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . '/new.php' );
require( DIR_VIEWS . '/footer.php' );