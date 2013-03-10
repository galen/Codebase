<?php if( $current_page > $total_pages ): ?>
    <p>This page does not exist</p>
<?php else: ?>
<h2 class="title">Language: <?= e( $languages[$language]['name'] ) ?> (<?= $language_code_count ?>)</h2>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>