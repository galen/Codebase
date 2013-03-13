<?php if( $current_page > $total_pages ): ?>
<p>This page does not exist</p>
<?php else: ?>
<h2 class="title">Browse code <span class="code-count">(<?= $code_count ?>)</span></h2>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>