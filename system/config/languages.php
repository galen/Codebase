<?php

$languages = array(
    'markdown' => array(
        'mode' => 'markdown',
        'name' => 'Markdown',
        'depends' => array(
            'xml'
        ),
        'mime' => 'text/x-markdown'
    ),
    'php' => array(
        'mode' => 'php',
        'name' => 'PHP',
        'depends' => array(
            'htmlmixed',
            'xml',
            'javascript',
            'css',
            'clike'
        ),
        'mime' => 'text/x-php'
    ),
    'phpwithhtml' => array(
        'mode' => 'php',
        'name' => 'PHP with HTML',
        'depends' => array(
            'htmlmixed',
            'xml',
            'javascript',
            'css',
            'clike'
        ),
        'mime' => 'application/x-httpd-php'
    )
);