<?php

$default_order = array( 'order_by' => 'modified', 'order_dir' => 'desc' );
$get_data = parse_list_data( $_GET, $default_order );

try {
    $result = $api->get( URL_API . '/browse/', $get_data );
    $result_count = $api->get( URL_API . '/browse/', array( 'count' => '1' ) );
    $code = $result->getData();

    $current_page = isset( $get_data['page'] ) ? $get_data['page'] : 1;
    $pagination = get_pagination( $current_page, $result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );


    $view = '/index.php';
}
catch( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );