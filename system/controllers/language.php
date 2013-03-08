<?php

if ( !isset( $languages[$language] ) ) {
    $error = 'Invalid Language';
    $view = '/error.php';
}
else {

    try {
        $result = $api->get( URL_API . '/language/' . $language, array( 'order_by' => 'modified', 'order_dir' => 'desc' ) );
        $result_count = $api->get( URL_API . '/language/' . $language, array( 'count' => '1' ) );
        $current_page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
        $code = $result->getData();
        $pagination = get_pagination( $current_page, $result_count->getData()->count, CODES_PER_PAGE, PAGINATION_VIEWPORT );
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