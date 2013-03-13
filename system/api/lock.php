<?php

require( 'api.php' );

if ( $_POST['password'] != CODE_LOCK_PASSWORD ) {
    api_error( 401, 'Unauthorized', 'Incorrect lock password' );
}

try {
    $code_statement = $database->prepare( 'update code set lock=1 where code.id=:id' );
    $code_statement->bindValue( ':id', $id );
    $code_statement->execute();
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

api_output( 200, 'OK', $code_statement->rowCount() );
