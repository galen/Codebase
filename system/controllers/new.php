<?php

if ( $_POST ) {

    $result = $api->post( URL_API . '/new/', $_POST );

    if ( $result->isError() ) {
        $error = $result->getError();
        $form_data = (object)$_POST;
    }
    else {
        header( sprintf( "Location: /code/%s/%s/", $result->id, string_to_url( $result->name ) ) );
        exit;
    }

}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . '/new.php' );
require( DIR_VIEWS . '/footer.php' );