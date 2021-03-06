<?php

$app->get('/', function() use( $app, $api, $languages ) {
    $page_name = 'index';
    require( DIR_CONTROLLERS . '/index.php' );
});

$app->map('/new/', function() use( $app, $api, $languages ) {
    $page_name = 'new';
    require( DIR_CONTROLLERS . '/new.php' );
})->via( 'GET', 'POST' );

$app->get('/browse/', function() use( $app, $api, $languages ) {
    $page_name = 'browse';
    require( DIR_CONTROLLERS . '/browse.php' );
});

$app->get('/tags/', function() use( $app, $api, $languages ) {
    $page_name = 'tags';
    require( DIR_CONTROLLERS . '/tags.php' );
});

$app->get('/tag/:tags/', function( $tags ) use( $app, $api, $languages ) {
    $page_name = 'tag';
    require( DIR_CONTROLLERS . '/tag.php' );
});

$app->get('/language/:language/', function( $language ) use( $app, $api, $languages ) {
    $page_name = 'language';
    require( DIR_CONTROLLERS . '/language.php' );
});

$app->get('/languages/', function() use( $app, $api, $languages ) {
    $page_name = 'languages';
    require( DIR_CONTROLLERS . '/languages.php' );
});

$app->get('/search/', function() use( $app, $api, $languages ) {
    $page_name = 'search';
    require( DIR_CONTROLLERS . '/search.php' );
});

$app->map( '/code/:id/(:stub/)', function( $id, $stub = null ) use( $app, $api, $languages ){
    $page_name = 'code';
    require(DIR_CONTROLLERS . '/code.php');
})->via( 'GET', 'POST' );


// API calls
$app->get('/api/count/', function() use( $app, $languages ) {
    require( DIR_API . '/count.php' );
});

$app->post('/api/edit/:id/', function( $id ) use( $app, $languages ) {
    require( DIR_API . '/edit.php' );
});

$app->post('/api/new/', function() use( $app, $languages ) {
    require( DIR_API . '/new.php' );
});

$app->delete('/api/delete/:id/', function( $id ) use( $app, $api, $languages ) {
    require( DIR_API . '/delete.php' );
});

$app->post('/api/lock/:id/', function( $id ) use( $app, $languages ) {
    require( DIR_API . '/lock.php' );
});

$app->post('/api/unlock/:id/', function( $id ) use( $app, $languages ) {
    require( DIR_API . '/unlock.php' );
});

$app->post('/api/star/:id/', function( $id ) use( $app, $languages ) {
    require( DIR_API . '/star.php' );
});

$app->post('/api/unstar/:id/', function( $id ) use( $app, $languages ) {
    require( DIR_API . '/unstar.php' );
});

$app->get('/api/browse/', function() use( $app, $languages ) {
    require( DIR_API . '/browse.php' );
});

$app->get('/api/tags/', function() use( $app, $languages ) {
    require( DIR_API . '/tags.php' );
});

$app->get('/api/languages/', function() use( $app, $languages ) {
    require( DIR_API . '/languages.php' );
});

$app->get('/api/languages/full/', function() use( $app, $languages ) {
    require( DIR_API . '/languages_full.php' );
});

$app->get('/api/code/:id/', function( $id ) use( $app ) {
    require( DIR_API . '/code.php' );
});

$app->get('/api/language/:language/', function( $language ) use( $app ) {
    require( DIR_API . '/language.php' );
});

$app->get('/api/recent/', function() use( $app ) {
    require( DIR_API . '/recent.php' );
});

$app->get('/api/search/', function() use( $app ) {
    require( DIR_API . '/search.php' );
});

$app->get('/api/tag/:tags/', function( $tags ) use( $app ) {
    require( DIR_API . '/tag.php' );
});
