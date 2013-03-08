<?php

require( 'api.php' );

$data = array_intersect_key(
    array_map( 'trim', $_POST ),
    array_flip( array( 'name', 'tags', 'code', 'language' ) )
);

if ( !$data['name'] ) {
    $data['name'] = 'Untitled';
}


$database->beginTransaction();

// Insert the code
$code_statement = $database->prepare( "update code set name=:name, code=:code, language=:language, modified=DATETIME('now') where id=:id" );
$code_statement->bindValue( ':id', $id );
$code_statement->bindValue( ':name', $data['name'] );
$code_statement->bindValue( ':code', $data['code'] );
$code_statement->bindValue( ':language', $data['language'] );
try {
    $code_statement->execute();
} catch( PDOException $e ) {
    $database->rollback();
    error( 500, 'Server Error' );
    exit;
}

// Delete tag associations
$tags_delete = $database->prepare( "delete from codeXtag where code_id=:id" );
$tags_delete->bindValue( ':id', $id );
try {
    $tags_delete->execute();
} catch( PDOException $e ) {
    $database->rollback();
    error( 500, 'Server Error' );
    exit;
}

// No tags
if ( !$data['tags'] ) {
    $database->commit();
    die(
        json_encode(
            array(
                'name'      => $data['name'],
                'id'        => $id
            )
        )
    );
}

// Normalize tags
$data['tags'] = preg_split( '~\s*,\s*~', $data['tags'] );
$data['tags'] = array_map( 'string_to_url', $data['tags'] );

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
        error( 500, 'Server Error', 'Unknown Error' );
        exit;
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
    error( 500, 'Server Error', 'Unknown Error' );
    exit;
}
$tag_ids = $tag_ids_statement->fetchAll( PDO::FETCH_COLUMN );


$tag_x_code_statement = $database->prepare( "Insert into codeXtag (tag_id, code_id) values(:tag_id, :code_id)" );
$tag_x_code_statement->bindValue( ':code_id', $id );
foreach( $tag_ids as $tag_id ) {
    $tag_x_code_statement->bindValue( ':tag_id', $tag_id );
    try {
        $tag_x_code_statement->execute();
    } catch( PDOException $e ) {
        $database->rollback();
        error( 500, 'Server Error', 'Unknown Error' );
        exit;
    }
}

$database->commit();

die(
    json_encode(
        array(
            'name'      => $data['name'],
            'id'        => $id
        )
    )
);