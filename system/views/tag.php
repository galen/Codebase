<?php if( $current_page > $total_pages ): ?>
    <p>This page does not exist</p>
<?php else: ?>
<h2 class="title">Tag<?php if( count( $tags ) > 1 ): ?>s<?php endif; ?>: <?= implode( ', ', $tags ) ?> <span class="code-count">(<?= $tag_code_count ?>)</span></h2>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>