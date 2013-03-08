<?php

function string_to_url( $string ) {
    return trim( preg_replace( array( '~[^a-z^\-^\s^\d]~', '~\s+~' ), array( '', '-' ), strtolower( $string ) ), '-' );
}

function e( $string ) {
    return htmlspecialchars( $string );
}

function tstamp_long( $datetime ) {
    return date( 'M j, Y @ g:ia', strtotime( $datetime ) );
}
function tstamp_short( $datetime ) {
    return date( 'n/j/y@Hi', strtotime( $datetime ) );
}

function code_tags_to_array( &$code ) {
    foreach( $code as &$c ) {
        $c['tags'] = explode( ',', $c['tags'] );
    }
}

function get_pagination_sql( array $pagination ) {

    if ( !isset( $pagination['page'] ) ) {
        $pagination['page'] = 1;
    }

    if( $pagination['page'] != ctype_digit( $pagination['page'] ) ) {
        $pagination['page'] = 1;
    }

    if (
        !isset( $pagination['order_by'], $pagination['order_dir'] ) ||
        !in_array( $pagination['order_by'], array( 'name', 'modified', 'created', 'language' ) ) ||
        !in_array( $pagination['order_dir'], array( 'asc', 'desc' ) )
    ) {
        $pagination['order_by'] = 'name';
        $pagination['order_dir'] = 'asc';
    }

    return sprintf(
        " order by %s collate nocase %s limit %s, %s",
        $pagination['order_by'],
        $pagination['order_dir'],
        ( $pagination['page'] - 1 ) * CODES_PER_PAGE,
        isset( $_GET['count'] ) ? -1 : CODES_PER_PAGE
    );

}

function get_pagination( $current_page, $total_items, $items_per_page, $pagination_viewport ) {
    $total_pages = ceil( $total_items / $items_per_page );
    $start_page = max( $current_page - $pagination_viewport, 1 );
    $end_page = min( $start_page + ( $pagination_viewport * 2 ), $total_pages );
    $start_page = max( $end_page - ( $pagination_viewport * 2 ), 1 );
    $pages = range( $start_page, $end_page );

    $first_page_link = $last_page_link = false;
    if ( !in_array( 1, $pages ) ) {
        $first_page_link = true;
    }
    if ( !in_array( $total_pages, $pages ) ) {
        $last_page_link = true;
    }

    $previous_page = $current_page == 1 ? null : $current_page - 1;
    $next_page = $current_page == $total_pages ? null : $current_page + 1;
    return (object) array(
        'pages'             => $pages,
        'previous_page'     => $previous_page,
        'next_page'         => $next_page,
        'total_pages'       => $total_pages,
        'first_page_link'   => $first_page_link,
        'last_page_link'    => $last_page_link
    );
}