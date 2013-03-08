<?php

try {
    $result = $api->get( URL_API . '/code/' . $id );
    $code = $result->getData();
    $view = '/code.php';
    if ( string_to_url( $code->name ) != string_to_url( $name ) ) {
        header( sprintf( "Location: /code/%s/%s/", $id, string_to_url( $code->name ) ) );
        exit;
    }
    if ( $code->language == 'markdown' ) {
        require( DIR_SYSTEM . '/lib/markdown.php' );
        $markdown_html = Markdown( $code->code );
    }
}
catch( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );