<?php

/*

'' => array(
    'mode' => '',
    'name' => '',
    'depends' => array(),
    'mime' => ''
),

*/

$languages = array(
    'c' => array(
        'mode' => 'clike',
        'name' => 'C',
        'depends' => array('clike'),
        'mime' => 'text/x-csrc'
    ),
    'cplusplus' => array(
        'mode' => 'clike',
        'name' => 'C++',
        'depends' => array('clike'),
        'mime' => 'text/x-c++src'
    ),
    'csharp' => array(
        'mode' => 'clike',
        'name' => 'C#',
        'depends' => array('clike'),
        'mime' => 'text/x-csharp'
    ),
    'css' => array(
        'mode' => 'css',
        'name' => 'CSS',
        'depends' => array('css'),
        'mime' => 'text/css'
    ),
    'html' => array(
        'mode' => 'htmlmixed',
        'name' => 'HTML',
        'depends' => array(
            'javascript',
            'css',
            'xml'
        ),
        'mime' => 'text/html'
    ),
    'java' => array(
        'mode' => 'clike',
        'name' => 'Java',
        'depends' => array('clike'),
        'mime' => 'text/x-java'
    ),
    'javascript' => array(
        'mode' => 'javascript',
        'name' => 'Javascript',
        'depends' => array( 'javascript' ),
        'mime' => 'text/javascript'
    ),
    'json' => array(
        'mode' => 'javascript',
        'name' => 'JSON',
        'depends' => array( 'javascript' ),
        'mime' => 'application/json'
    ),
    'less' => array(
        'mode' => 'less',
        'name' => 'LESS',
        'depends' => array( 'less' ),
        'mime' => 'text/css'
    ),
    'markdown' => array(
        'mode' => 'markdown',
        'name' => 'Markdown',
        'depends' => array(
            'xml'
        ),
        'mime' => 'text/x-markdown'
    ),
    'perl' => array(
        'mode' => 'perl',
        'name' => 'Perl',
        'depends' => array( 'perl' ),
        'mime' => 'text/x-perl'
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
    ),
    'python' => array(
        'mode' => 'python',
        'name' => 'Python',
        'depends' => array( 'python' ),
        'mime' => 'text/x-python'
    ),
    'ruby' => array(
        'mode' => 'ruby',
        'name' => 'Ruby',
        'depends' => array( 'ruby' ),
        'mime' => 'text/x-ruby'
    ),
    'sass' => array(
        'mode' => 'sass',
        'name' => 'Sass',
        'depends' => array( 'sass' ),
        'mime' => 'text/x-sass'
    ),
    'smalltalk' => array(
        'mode' => 'smalltalk',
        'name' => 'Smalltalk',
        'depends' => array( 'smalltalk' ),
        'mime' => 'text/x-stsrc'
    ),
    'sql' => array(
        'mode' => 'sql',
        'name' => 'SQL',
        'depends' => array( 'sql' ),
        'mime' => 'text/x-sql'
    ),
    'vbdotnet' => array(
        'mode' => 'vb',
        'name' => 'VB.NET',
        'depends' => array( 'vb' ),
        'mime' => 'text/x-vb'
    ),
    'vbscript' => array(
        'mode' => 'vbscript',
        'name' => 'VBScript',
        'depends' => array( 'vbscript' ),
        'mime' => 'text/vbscript'
    ),
    'xml' => array(
        'mode' => 'xml',
        'name' => 'XML',
        'depends' => array( 'xml' ),
        'mime' => 'application/xml'
    ),
    'yaml' => array(
        'mode' => 'yaml',
        'name' => 'YAML',
        'depends' => array( 'yaml' ),
        'mime' => 'text/x-yaml'
    )
);