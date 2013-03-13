<?php

require( 'api.php' );

$data = array_map( 'trim', $_POST );

validate_code( $data );

try {
    $database->beginTransaction();
    $code_statement = $database->prepare( "Insert into code (id, name, code, language, created, modified) values(null, :name, :code, :language, DATETIME('now'), DATETIME('now'));" );
    $code_statement->bindValue( ':name', $data['name'] );
    $code_statement->bindValue( ':code', $data['code'] );
    $code_statement->bindValue( ':language', $data['language'] ? $data['language'] : null );
    $code_statement->execute();
}
catch( PDOException $e ) {
    $database->rollback();
    api_error( 500, 'Server Error' );
}
$code_id = $database->lastInsertId();

// No tags
if ( empty( $data['tags'] ) ) {
    $database->commit();
    api_output(
        201,
        'Created',
        array(
            'name'      => $data['name'],
            'id'        => $code_id
        )
    );
}

$data['tags'] = normalize_tags( $data['tags'] );

// Insert the tags
$tag_statement = $database->prepare( "Insert into tag (id, tag) values(null, :tag)" );
foreach( $data['tags'] as $tag) {
    $tag_statement->bindValue( ':tag', $tag );
    try {
        $tag_statement->execute();
    } catch( PDOException $e ) {
        if ( $e->getCode() == 23000 ) {
            continue;
        }
        $database->rollback();
        api_error( 500, 'Server Error' );
    }
}

// Get the tag IDs associated with the code
$tag_ids_statement = $database->prepare(
    sprintf(
        "select id from tag where tag in (%s)",
        implode(
            ',',
            array_map(
                function( $n ){ return ':tag'.$n; },
                range( 0, count( $data['tags'] ) - 1 )
            )
        )
    )
);
foreach( $data['tags'] as $tag_key => $tag ) {
    $tag_ids_statement->bindValue( ':tag' . $tag_key, $tag );
}

try {
    $tag_ids_statement->execute();
} catch( PDOException $e ) {
    $database->rollback();
    api_error( 500, 'Server Error' );
}
$tag_ids = $tag_ids_statement->fetchAll( PDO::FETCH_COLUMN );


$tag_x_code_statement = $database->prepare( "Insert into codeXtag (tag_id, code_id) values(:tag_id, :code_id)" );
$tag_x_code_statement->bindValue( ':code_id', $code_id );
foreach( $tag_ids as $tag_id ) {
    $tag_x_code_statement->bindValue( ':tag_id', $tag_id );
    try {
        $tag_x_code_statement->execute();
    } catch( PDOException $e ) {
        $database->rollback();
        api_error( 500, 'Server Error' );
    }
}

$database->commit();

api_output(
    201,
    'Created',
    array(
       'name'      => $data['name'],
       'id'        => $code_id
    )
);