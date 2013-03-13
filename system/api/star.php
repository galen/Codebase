<?php

require( 'api.php' );

try {
    $code_statement = $database->prepare( 'update code set star=1 where code.id=:id' );
    $code_statement->bindValue( ':id', $id );
    $code_statement->execute();
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

api_output( 200, 'OK', $code_statement->rowCount() );
