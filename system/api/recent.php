<?php

require( 'api.php' );

$code_statement = $database->prepare( 'select code.id, code.name, code.name, code.language, code.modified, code.created,  (select group_concat(tag.tag) from tag left outer join codeXtag on tag.id=codeXtag.tag_id where codeXtag.code_id = code.id) as tags from code order by modified desc' );

try {
    $code_statement->execute();
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$code_data = $code_statement->fetchAll( PDO::FETCH_ASSOC );

code_tags_to_array( $code_data );

die( json_encode( $code_data ) );