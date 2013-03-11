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
    <body>

        <div id="header-wrapper">
            <header>
                <h1><a href="/">Codebase</a></h1>
                <ul id="navigation">
                    <li class="divider"></li>
                    <li><a href="/new/">New</a></li>
                    <li><a href="/browse/">Browse</a></li>
                    <!--<li><a href="/languages/">Languages</a></li>
                    <li><a href="/tags/">Tags</a></li>-->
                    <li><a href="/search/">Search</a></li>
                </ul>
            </header>
        </div>

        <div id="content"<?php if( CODE_EDITOR_MAX_WIDTH ): ?> style="max-width:<?= CODE_EDITOR_MAX_WIDTH ?>"<?php endif; ?>>
