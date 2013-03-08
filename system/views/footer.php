
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/public/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="/public/js/main.js"></script>
        <script src="/public/js/codemirror/codemirror.js"></script>
        <?php if( isset( $code->language ) ): ?>
        <script src="/public/js/codemirror/mode/<?= e( $languages[$code->language]['mode'] ) ?>/<?= e( $languages[$code->language]['mode'] ) ?>.js"></script>
        <?php foreach( $languages[$code->language]['depends'] as $depend ): ?>
        <script src="/public/js/codemirror/mode/<?= $depend ?>/<?= $depend ?>.js"></script>
        <?php endforeach; ?>
        <?php endif; ?>
        <script>
            var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                lineNumbers: true,
                <?php if( isset( $code->language ) && $code->language == 'markdown' ): ?>lineWrapping: true,<?php endif; ?>
                <?php if( isset( $code_disabled ) ): ?>readOnly: true,<?php endif; ?>
                <?php if( isset( $code->language ) ): ?>mode: '<?= e( $languages[$code->language]['mime'] ) ?>'<?php endif; ?>
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