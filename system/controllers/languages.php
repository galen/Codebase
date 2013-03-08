<?php

$result = $api->get( URL_API . '/languages/' );

if ( $result->isError() ) {
    $error = $result->getError();
    $view = '/error.php';
}
else {
    $langs = $result->getData();
    $view = '/languages.php';
}


require( DIR_VIEWS . '/header.php' );
require( DIR_VIEWS . $view );
require( DIR_VIEWS . '/footer.php' );