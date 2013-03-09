<?php

$get_data = parse_list_data( $_GET );

try {
    $result_count = $api->get( URL_API . '/browse/', array( 'count' => '1' ) );
    $code_count = $result_count->getData()->count;

    if ( isset(  $get_data['t']) ) {
        switch( $get_data['t'] ) {
            case 'tag':
                header( 'Location: /tag/' . $get_data['tag'] );
                exit;
            break;
            case 'tags':
                $tags = preg_replace( '~\s*,\s*~', ' ', $get_data['q'] );
                header( 'Location: /tag/' . urlencode( $tags ) );
                exit;
            break;
            case 'language':
                header( 'Location: /language/' . $get_data['language'] );
                exit;
            break;
        }
    }
    
    if ( isset( $get_data['q'] ) ) {
        $search_result = $api->get( URL_API . '/search/', $get_data );
        $search_result_count = $api->get( URL_API . '/search/', array_merge( $get_data, array( 'count' => '1' ) ) );
        $current_page = isset( $get_data['page'] ) ? $get_data['page'] : 1;
        $pagination = get_pagination( $current_page, $search_result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );
        $code = $search_result->getData();
        $results = true;
        $view = '/search_results.php';
    }
    else {
        $langs_result = $api->get( URL_API . '/languages/' );
        $tags_result = $api->get( URL_API . '/tags/' );
        $langs = $langs_result->getData();
        $tags = $tags_result->getData();
        $view = '/search.php';
    }
}
catch ( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );