<?php if( count( $code ) === 0 ): ?>
<p>No code added. <a href="/new/">Add some now</a>.</p>
<?php else: ?>
<h2 class="title">Newly modified/created code</h2>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>