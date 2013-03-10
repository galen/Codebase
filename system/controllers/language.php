<?php

if ( !isset( $languages[$language] ) ) {
    $error = 'Invalid Language';
    $view = '/error.php';
}
else {

    $get_data = parse_list_data( $_GET );

    try {

        $language_code = $api->get( URL_API . '/language/' . urlencode( $language ), $get_data );
        $language_code_count = $api->get( URL_API . '/language/' . urlencode( $language ), array( 'count' => '1' ) )->getData()->count;
        $code = $language_code->getData();

        $current_page = isset( $get_data['page'] ) ? $get_data['page'] : 1;
        $total_pages = ceil( $language_code_count / CODES_PER_PAGE );
        $pagination = get_pagination( $current_page, $total_pages, PAGINATION_VIEWPORT );

        $view = '/language.php';
    }
    catch( Exception $e ) {
        $error = $e->getMessage();
        $view = '/error.php';
    }

}

require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );