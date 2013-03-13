<?php

require( 'api.php' );

try {
    $search_statement = $database->prepare(
        sprintf( '
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
        where
            %s
        like
            :query
        %s
      ',
            $_GET['t'],
            get_pagination_sql( $_GET )
        )
    );

    $search_statement->bindValue( ':query', '%'.$_GET['q'].'%' );
    $search_statement->execute();
    $result = $search_statement->fetchAll( PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

if ( isset( $_GET['count'] ) ) {
    $result = array( 'count' => count( $result ) );
}

api_output( 200, 'OK', $result );
