<?php

require( 'api.php' );

if ( $_POST['password'] != CODE_LOCK_PASSWORD ) {
    error( 401, 'Unauthorized', 'Incorrect lock password' );
    exit;
}

$code_statement = $database->prepare( 'update code set lock=1 where code.id=:id' );
$code_statement->bindValue( ':id', $id );

try {
    $code_statement->execute();
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$result = $code_statement->rowCount();

die( json_encode( $result ) );