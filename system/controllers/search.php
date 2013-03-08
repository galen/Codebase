<?php

try {
    $result_count = $api->get( URL_API . '/browse/', array( 'count' => '1' ) );
    $code_count = $result_count->getData()->count;

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
        $search_result_count = $api->get( URL_API . '/search/', array_merge( $_GET, array( 'count' => '1' ) ) );
        $current_page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
        $pagination = get_pagination( $current_page, $search_result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );
        $code = $search_result->getData();
        $results = true;
        $view = '/search_results.php';
        $order_by = isset( $_GET['order_by'] ) ? $_GET['order_by'] : 'name';
        $order_by_dir = isset( $_GET['order_by'] ) ? $_GET['order_by'] . $_GET['order_dir'] : 'nameasc';
    }
}
catch ( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );