<?php

require( 'api.php' );

$code_statement = $database->prepare( 'update code set star=0 where code.id=:id' );
$code_statement->bindValue( ':id', $id );

try {
    $code_statement->execute();
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$result = $code_statement->rowCount();

die( json_encode( $result ) );