<?php

require( 'api.php' );

$code_statement = $database->prepare( 'select count( id ) as count from code' );

try {
    $code_statement->execute();
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$result = $code_statement->fetchAll( PDO::FETCH_ASSOC );

die( json_encode( $result[0] ) );