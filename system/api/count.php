<?php

require( 'api.php' );

try {
    $code_statement = $database->prepare( 'select count( id ) as count from code' );
    $code_statement->execute();
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

$result = $code_statement->fetchAll( PDO::FETCH_ASSOC );
api_output( 200, 'OK', $result[0] );