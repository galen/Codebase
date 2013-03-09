<?php

$get_data = parse_list_data( $_GET );

try {
    $browse_code = $api->get( URL_API . '/browse/', $get_data );
    $browse_code_count = $api->get( URL_API . '/browse/', array( 'count' => '1' ) )->getData()->count;
    $code = $browse_code->getData();

    $current_page = isset( $get_data['page'] ) ? $get_data['page'] : 1;
    $total_pages = ceil( $browse_code_count / CODES_PER_PAGE );
    $pagination = get_pagination( $current_page, $total_pages, PAGINATION_VIEWPORT );

    $view = '/browse.php';
}
catch ( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );