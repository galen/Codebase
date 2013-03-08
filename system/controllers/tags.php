<?php

$result = $api->get( URL_API . '/tags/' );

if ( $result->isError() ) {
    $error = $result->getError();
    $view = '/error.php';
}
else {
    $tags = $result->getData();
    $view = '/tags.php';
}


require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );