<h2 class="title">Search Results for "<?= e( $_GET['q'] ) ?>"</h2>
<?php if( count( $code ) === 0 ): ?>
<p>No results</p>
<?php else: ?>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>