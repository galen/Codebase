<?php

require( 'api.php' );

$code_statement = $database->prepare( '
    select
        code.id,
        code.name,
        code.name,
        code.language,
        code.star,
        code.lock,
        code.modified,
        code.created,
        (select group_concat(tag.tag) from tag left outer join codeXtag on tag.id=codeXtag.tag_id where codeXtag.code_id = code.id) as tags
    from
        code
' . get_pagination_sql( $_GET ) );

try {
    $code_statement->execute();
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

$result = $code_statement->fetchAll( PDO::FETCH_ASSOC );

if ( isset( $_GET['count'] ) ) {
    $result = array( 'count' => count( $result ) );
}
else {
    code_tags_to_array( $result );
}

die( json_encode( $result ) );