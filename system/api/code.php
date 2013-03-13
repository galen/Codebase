<?php

require( 'api.php' );

try {
    $code_statement = $database->prepare( 'select * from code where id=:id' );
    $code_statement->bindValue( ':id', $id );
    $code_statement->execute();
    $code_statement->execute();
    $code_data = $code_statement->fetchAll( PDO::FETCH_ASSOC );
    if ( !count( $code_data ) ) {
        error( 404, 'Not Found', 'Invalid Code ID' );
        exit;
    }
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$code_data[0]['tags'] = array();

try {
    $tag_statement = $database->prepare( 'select tag.id, tag.tag from tag left join codeXtag on tag.id=codeXtag.tag_id where codeXtag.code_id=:id' );
    $tag_statement->bindValue( ':id', $id );
    $tag_statement->execute();
    $tag_data = $tag_statement->fetchAll( PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

foreach( $tag_data as $tag ) {
    $code_data[0]['tags'][$tag['id']] = $tag['tag'];
}

$code = $code_data[0];

die( json_encode( $code ) );
