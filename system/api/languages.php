<?php

require( 'api.php' );

try {
    $languages_statement = $database->prepare(
        'select
            count(code.id) as count,
            code.language
        from
            code
        group by
            code.language
        order by
            code.language
        asc'
    );
    $languages_statement->execute();
    $code_languages = $languages_statement->fetchAll( PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
    api_error( 500, 'Server Error', 'Unknown Error' );
}

api_output( 200, 'OK', $code_languages );
