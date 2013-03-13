<?php

header( 'Content-type: application/json' );

$database = new PDO( sprintf( 'sqlite:%s', DATABASE ) );
$database->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

function error( $code, $status, $message = null ) {
    header( sprintf( 'HTTP/1.1 %s %s', $code, $status ) );
    if ( $message ) {
        echo json_encode(
            array(
                'error' => $message
            )
        );
    }
    exit;
}