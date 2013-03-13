<?php

function api_error( $code, $status, $message = null ) {
    api_output( $code, $status, array( 'error' => $message ) );
}

function api_output( $code, $status, $output = null ) {
    header( sprintf( 'HTTP/1.1 %s %s', $code, $status ) );
    die( json_encode( $output ) );
}

try {
    $database = new PDO( sprintf( 'sqlite:%s', DATABASE ) );
    $database->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

header( 'Content-type: application/json' );