<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Codebase</title>
        <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/public/css/normalize.min.css" />
  <script src="/public/js/vendor/custom.modernizr.js"></script>
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/codemirror.css">
        <link rel="stylesheet" href="/public/css/elegant.css">
    </head>
    <body id="<?= $page_name ?>">

        <div id="header-wrapper">
            <header>
                <h1><a href="<?= URL_BASE ?>">Codebase</a></h1>
                <ul id="navigation">
                    <li><a href="/new/"<?php if( $page_name == 'new' ): ?> class="active"<?php endif; ?>>New</a></li>
                    <li><a href="/browse/"<?php if( $page_name == 'browse' ): ?> class="active"<?php endif; ?>>Browse</a></li>
                    <!--<li><a href="/languages/">Languages</a></li>
                    <li><a href="/tags/">Tags</a></li>-->
                    <li><a href="/search/"<?php if( $page_name == 'search' ): ?> class="active"<?php endif; ?>>Search</a></li>
                </ul>
            </header>
        </div>

        <div id="content"<?php if( CODE_EDITOR_MAX_WIDTH ): ?> style="max-width:<?= CODE_EDITOR_MAX_WIDTH ?>"<?php endif; ?>>
