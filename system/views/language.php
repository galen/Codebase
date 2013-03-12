<?php if( $current_page > $total_pages ): ?>
    <p>This page does not exist</p>
<?php else: ?>
<h2 class="title">Language: <?= e( $languages[$language]['name'] ) ?> <span class="code-count">(<?= $language_code_count ?>)</span></h2>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>