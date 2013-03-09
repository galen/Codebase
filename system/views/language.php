<?php if( $result_count == 0  ): ?>
    <p>No code added. <a href="/new/">Add some now</a>.</p>
<?php elseif( $current_page > $total_pages ): ?>
    <p>This page does not exist</p>
<?php else: ?>
<h2 class="title">Recent Code for <?= e( $languages[$language]['name'] ) ?></h2>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>