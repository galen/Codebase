<?php

require( 'api.php' );

try {
    $code_statement = $database->prepare(
        'select
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
            code'
        . get_pagination_sql( $_GET )
    );
    $code_statement->execute();
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

$result = $code_statement->fetchAll( PDO::FETCH_ASSOC );

if ( isset( $_GET['count'] ) ) {
    $result = array( 'count' => count( $result ) );
}

api_output( 200, 'OK', $result );