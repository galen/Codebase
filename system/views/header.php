<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Codebase</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/normalize.min.css" />
        <script src="<?= URL_BASE ?>/public/js/vendor/custom.modernizr.js"></script>
        <script type="text/css">
        @font-face {
        	font-family: 'GeneralFoundicons';
    		src: url('<?= URL_BASE ?>/public/fonts/general_foundicons.eot');
    		src: url('<?= URL_BASE ?>/public/fonts/general_foundicons.eot?#iefix') format('embedded-opentype'),
    		url('<?= URL_BASE ?>/public/fonts/general_foundicons.woff') format('woff'),
    		url('<?= URL_BASE ?>/public/fonts/general_foundicons.ttf') format('truetype'),
    		url('<?= URL_BASE ?>/public/fonts/general_foundicons.svg#GeneralFoundicons') format('svg');
    		font-weight: normal;
    		font-style: normal;
    	}
        </script>
        <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/style.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/codemirror.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/elegant.css">
    </head>
    <body id="<?= $page_name ?>">

        <div id="header-wrapper">
            <header>
                <h1><a href="<?= URL_BASE ?>">Codebase</a></h1>
                <ul id="navigation">
                    <li><a href="<?= URL_BASE ?>/new/"<?php if( $page_name == 'new' ): ?> class="active"<?php endif; ?>>New</a></li>
                    <li><a href="<?= URL_BASE ?>/browse/"<?php if( $page_name == 'browse' ): ?> class="active"<?php endif; ?>>Browse</a></li>
                    <!--<li><a href="/languages/">Languages</a></li>
                    <li><a href="/tags/">Tags</a></li>-->
                    <li><a href="<?= URL_BASE ?>/search/"<?php if( $page_name == 'search' ): ?> class="active"<?php endif; ?>>Search</a></li>
                </ul>
            </header>
        </div>

        <div id="content"<?php if( CODE_EDITOR_MAX_WIDTH ): ?> style="max-width:<?= CODE_EDITOR_MAX_WIDTH ?>"<?php endif; ?>>
