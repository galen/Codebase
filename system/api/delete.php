<?php

require( 'api.php' );

try {
    $result = $api->get( URL_API . '/code/' . $id );
    $locked = $result->getData()->lock;
    if ( $locked ) {
        error( 409, 'Conflict', 'Code Locked' );
        exit;
    }
}
catch( Exception $e ) {
    error( 500, 'Server Error', $e->getMessage() );
    exit;
}

$code_statement = $database->prepare( 'delete from code where code.id=:id' );
$tag_statement = $database->prepare( 'delete from codeXtag where codeXtag.code_id=:id' );
$code_statement->bindValue( ':id', $id );
$tag_statement->bindValue( ':id', $id );

try {
    $code_statement->execute();
    $tag_statement->execute();
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$result = $code_statement->rowCount();

die( json_encode( $result ) );