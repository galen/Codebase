<?php

$view = '/code.php';

if ( $_POST ) {
    try {
        $result = $api->post( URL_API . '/edit/' . $id, $_POST );
        if ( $_POST['name'] != $_POST['name_old'] ) {
            header( sprintf( "Location: %s/code/%s/%s/?edit=true", URL_BASE, $result->id, string_to_url( $result->name ) ) );
            exit;
        }
        $edit_success = true;
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
    }
}

try {
    $result = $api->get( URL_API . '/code/' . $id );
    $code = $result->getData();
    $code->tags = implode( ', ', (array)$code->tags );
    if ( isset( $error ) ) {
        $code = (object)array_merge( (array)$code, $_POST );
    }
    $code_data = $code;
    $title = $code->name;
}
catch( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );