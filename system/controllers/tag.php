<?php

$get_data = parse_list_data( $_GET );

try {
    $tag_code = $api->get( URL_API . '/tag/' . urlencode( $tags ), $get_data );
    $tag_code_count = $api->get( URL_API . '/tag/' . urlencode( $tags ), array( 'count' => '1' ) )->getData()->count;
    $code = $tag_code->getData();
    $current_page = isset( $get_data['page'] ) ? $get_data['page'] : 1;
    $total_pages = ceil( $tag_code_count / CODES_PER_PAGE );
    $pagination = get_pagination( $current_page, $total_pages, PAGINATION_VIEWPORT );
    $tags = explode( ' ', $tags );
    $title = sprintf( 'Tag%s: %s', count( $tags ) > 1 ? 's' : '', implode( ', ', $tags ) );
    $view = '/tag.php';
}
catch( Exception $e ) {
    $error = $e->getMessage();
    $view = '/error.php';
}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );