<h2 class="title">Tags: <?= implode( ', ', $tags ) ?></h2>
<?php if( count( $code ) ): ?>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php else: ?>
<p>No matching code</p>
<?php endif; ?>