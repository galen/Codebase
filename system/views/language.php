
<h2 class="title">Recent Code for <?= e( $languages[$language]['name'] ) ?></h2>
<?php if( count( $code ) ): ?>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php else: ?>
<p>No matching code</p>
<?php endif; ?>