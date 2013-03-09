<?php

$get_data = parse_list_data( $_GET );

try {
    $result = $api->get( URL_API . '/browse/', $get_data );
    $result_count = $api->get( URL_API . '/browse/', array( 'count' => '1' ) );
    $current_page = isset( $get_data['page'] ) ? $get_data['page'] : 1;
    $pagination = get_pagination( $current_page, $result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );
    $code = $result->getData();
    $view = '/browse.php';
}
catch ( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );