<?php

require( 'api.php' );

$tags = explode( ' ', $tags );

$code_statement = $database->prepare(
    sprintf(
        'SELECT
            b.*,
            (select group_concat(tag.tag) from tag left outer join codeXtag on tag.id=codeXtag.tag_id where codeXtag.code_id = b.id) as tags
        FROM
            codeXtag bt,
            code b,
            tag t
        WHERE
            bt.tag_id = t.id
        AND
            (t.tag IN (%s))
        AND
            b.id = bt.code_id
        GROUP BY
            b.id
        HAVING
            COUNT( b.id )=%s' . get_pagination_sql( $_GET ),
        implode(
            ',',
            array_map(
                function( $n ){ return ':tag'.$n; },
                range( 0, count( $tags ) - 1 )
            )
        ),
        count( $tags )
    )
);

foreach( $tags as $tag_key => $tag ) {
    $code_statement->bindValue( ':tag'.$tag_key, $tag );
}
try {
    $code_statement->execute();
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

$result = $code_statement->fetchAll( PDO::FETCH_ASSOC );

if ( isset( $_GET['count'] ) ) {
    $result = array( 'count' => count( $result ) );
}

api_output( $result );
