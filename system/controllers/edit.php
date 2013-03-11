<?php

$view = '/edit.php';

if ( $_POST ) {
    try {
        $result = $api->post( URL_API . '/edit/' . $id, $_POST );
        if ( $_POST['name'] != $_POST['name_old'] ) {
            header( sprintf( "Location: %s/edit/%s/%s/?edit=true", URL_BASE, $result->id, string_to_url( $result->name ) ) );
            exit;
        }
        $edit_success = true;
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
        $code_data = (object)$_POST;
    }
}


try {
    $result = $api->get( URL_API . '/code/' . $id );
    $code_data = $result->getData();
    $code = (object)$code_data;
    $code_data->tags = implode( ', ', (array)$code_data->tags );
}
catch( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}


require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );