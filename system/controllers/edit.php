<?php

if ( $_POST ) {
    try {
        $result = $api->post( URL_API . '/edit/' . $id, $_POST );
        header( sprintf( "Location: /code/%s/%s/", $id, string_to_url( $result->name ) ) );
        exit;
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
        $code_data = (object)$_POST;
    }
}
else {
    try {
        $result = $api->get( URL_API . '/code/' . $id );
        $code_data = $result->getData();
        $code = (object)$code_data;
        $code_data->tags = implode( ', ', (array)$code_data->tags );
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
    }
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . '/edit.php' );
require( DIR_VIEWS . '/footer.php' );