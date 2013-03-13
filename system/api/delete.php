<?php

require( 'api.php' );

try {
    $result = $api->get( URL_API . '/code/' . $id );
    $locked = $result->getData()->lock;
    if ( $locked ) {
        api_error( 403, 'Forbidden', 'Code Locked' );
    }
}
catch( Exception $e ) {
    api_error( 500, 'Server Error', $e->getMessage() );
}

try {
    $code_statement = $database->prepare( 'delete from code where code.id=:id' );
    $tag_statement = $database->prepare( 'delete from codeXtag where codeXtag.code_id=:id' );
    $code_statement->bindValue( ':id', $id );
    $tag_statement->bindValue( ':id', $id );
    $code_statement->execute();
    $tag_statement->execute();
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

api_output( 200, 'OK', $code_statement->rowCount() );