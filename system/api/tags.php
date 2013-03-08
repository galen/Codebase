<?php

require( 'api.php' );

$tags_statement = $database->prepare( 'select count(codeXtag.tag_id) as count, codeXtag.tag_id, tag.tag from codeXtag left outer join tag on codeXtag.tag_id = tag.id group by codeXtag.tag_id order by tag.tag asc' );
try {
    $tags_statement->execute();
    $tags = $tags_statement->fetchAll( PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

die( json_encode( $tags ) );
