<?php

if ( isset(  $_GET['t']) ) {
    switch( $_GET['t'] ) {
        case 'tag':
            header( 'Location: /tag/' . $_GET['tag'] );
            exit;
        break;
        case 'tags':
            $tags = preg_replace( '~\s*,\s*~', ' ', $_GET['q'] );
            header( 'Location: /tag/' . urlencode( $tags ) );
            exit;
        break;
        case 'language':
            header( 'Location: /language/' . $_GET['language'] );
            exit;
        break;
    }
}

$view = '/search.php';

$langs_result = $api->get( URL_API . '/languages/' );
$tags_result = $api->get( URL_API . '/tags/' );

$langs = $langs_result->getData();
$tags = $tags_result->getData();

if ( isset( $_GET['q'] ) ) {
    $search_result = $api->get( URL_API . '/search/', $_GET );
    if ( $search_result === false ) {
        //error
    }
    elseif ( isset( $search_result->error ) ) {
        //error

    }
    else {
        $code = $search_result->getData();
        $result_count = $api->get( URL_API . '/search/', array_merge( $_GET, array( 'count' => '1' ) ) );
        $current_page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
        $pagination = get_pagination( $current_page, $result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );
        $view = '/search_results.php';
    }
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );