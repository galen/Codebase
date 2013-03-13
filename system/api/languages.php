<?php

require( 'api.php' );

try {
    $languages_statement = $database->prepare( 'select count(code.id) as count, code.language from code group by code.language order by code.language asc' );
    $languages_statement->execute();
    $languages = $languages_statement->fetchAll( PDO::FETCH_ASSOC );
} catch( PDOException $e ) {
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}

die( json_encode( $languages ) );
