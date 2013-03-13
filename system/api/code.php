<?php

require( 'api.php' );

try {
    $code_statement = $database->prepare( 'select * from code where id=:id' );
    $code_statement->bindValue( ':id', $id );
    $code_statement->execute();
    $code_statement->execute();
    $code_data = $code_statement->fetchAll( PDO::FETCH_ASSOC );
    if ( !count( $code_data ) ) {
        api_error( 404, 'Not Found', 'Invalid Code ID' );
    }
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

try {
    $tag_statement = $database->prepare( 'select tag.id, tag.tag from tag left join codeXtag on tag.id=codeXtag.tag_id where codeXtag.code_id=:id' );
    $tag_statement->bindValue( ':id', $id );
    $tag_statement->execute();
    $tag_data = $tag_statement->fetchAll( PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

$code = $code_data[0];
$code['tags'] = array();
foreach( $tag_data as $tag ) {
    $code['tags'][$tag['id']] = $tag['tag'];
}

api_output( 200, 'OK', $code );

