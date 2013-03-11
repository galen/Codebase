
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/public/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="/public/js/main.js"></script>
        <script src="/public/js/vendor/showdown.js"></script>
        <script src="/public/js/codemirror/codemirror.js"></script>
        <?php if( isset( $code->language, $languages[$code->language]['mode'] ) ): ?>
        <script src="/public/js/codemirror/mode/<?= e( $languages[$code->language]['mode'] ) ?>/<?= e( $languages[$code->language]['mode'] ) ?>.js"></script>
        <?php foreach( $languages[$code->language]['depends'] as $depend ): ?>
        <script src="/public/js/codemirror/mode/<?= $depend ?>/<?= $depend ?>.js"></script>
        <?php endforeach; ?>
        <?php endif; ?>
        <script>
            var code_editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                lineNumbers: true,
                <?php if( isset( $code->language ) && $code->language == 'markdown' ): ?>lineWrapping: true,<?php endif; ?>
                <?php if( isset( $code_disabled ) ): ?>readOnly: true,<?php endif; ?>
                <?php if( isset( $code->language, $languages[$code->language]['mode'] ) ): ?>mode: '<?= e( $languages[$code->language]['mime'] ) ?>'<?php endif; ?>
            });
            code_editor.on( 'scroll', function(){
                $( '#code-preview' ).scrollTop( code_editor.getScrollInfo().top );
            });
        </script>
        <script>
            var url_base = '<?= URL_BASE ?>';
            var showdown = new Showdown.converter();

            $( '.toggle-preview' ).click(function(){
                if ( $( this ).parent().parent().parent().hasClass( 'split' ) ) {
                    $( this).next().trigger( 'click' );
                }
                else {
                    editor = $( this ).parent().parent().parent().data( 'editor' );
                    preview = $( this ).parent().parent().next();
                    update_preview( editor, preview );
                }
                $( this ).parent().parent().next().toggle();
                return false;
            });

            $( '.preview-container' ).scroll(function(){;
                var length = $(this).scrollTop();
                $( this ).parent().data( 'editor' );
                window[editor].scrollTo( 0, length );
            });

            function update_preview( editor, preview ) {
                var html = showdown.makeHtml( window[editor].getValue() );
                preview.html( html );
            }
            code_editor.on( 'change', function(){
                update_preview( 'code_editor', $( '#code-preview' ) );
            });
            $( '.toggle-split').click(function(){
                editor = $( this ).parent().parent().parent().data( 'editor' );
                preview = $( this ).parent().parent().next();
                update_preview( editor, preview );
                $( this ).parent().parent().next().show();
                $( this ).parent().parent().parent().toggleClass( 'split' );
                return false;
            });

            function hide_markdown() {
                $( '.toggle').hide();
                $( '.text-preview-wrapper' ).removeClass( 'split' );
                $( '.preview-container' ).hide();
            }

            function show_markdown() {
                $( '.toggle' ).show();
            }

        </script>
        <script>
            $.ajaxSetup({
                cache: true
            });
            $( "#language-selector" ).change(function(){
            language = $(this).val();
            if ( language == '' ) {
                code_editor.setOption( "mode", null );
                return;
            }
            $.ajax({
                    type: 'GET',
                    url: '/api/languages/full/',
                    data: {}
                }).done( function( data ) {
                    language_full = data[language];

                    if ( language_full['mode'] == 'markdown' ) {
                        show_markdown();
                    }
                    else {
                        hide_markdown();
                    }
                    // Load the mode javascript
                    $.getScript( '/public/js/codemirror/mode/' + language_full['mode'] + '/' + language_full['mode'] + '.js', function(){});
                    // Load the modes dependencies
                    if ( !language_full['depends'].length ){
                        console.log( 'Loading mode:' + language_full['mime'] );
                        code_editor.setOption( "mode", language_full['mime'] );
                    }
                    for( i=0; i< language_full['depends'].length; i++ ) {
                        $.getScript( '/public/js/codemirror/mode/' + language_full['depends'][i] + '/' + language_full['depends'][i] + '.js', function(){
                            console.log( 'Loading mode:' + language_full['mime'] );
                            code_editor.setOption( "mode", language_full['mime'] );
                        });
                    }
                }).fail( function( xhr ) {
                    data = jQuery.parseJSON( xhr.responseText );
                    if ( typeof( data.error ) !== undefined ) {
                        alert( data.error );
                    }
                    else {
                        alert( 'Error retrieving language data' );
                    }
                });

            });
        </script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>