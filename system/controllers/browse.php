<?php

try {
    $result = $api->get( URL_API . '/browse/', $_GET );
    $result_count = $api->get( URL_API . '/browse/', array( 'count' => '1' ) );
    $current_page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
    $pagination = get_pagination( $current_page, $result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );
    $code = $result->getData();
    $view = '/browse.php';
    $order_by = isset( $_GET['order_by'] ) ? $_GET['order_by'] : 'name';
    $order_by_dir = isset( $_GET['order_by'] ) ? $_GET['order_by'] . $_GET['order_dir'] : 'nameasc';
}
catch ( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );