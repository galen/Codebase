<h2 class="title">Search Results for <?php if( $get_data['t'] == 'code' ): ?>code containing <?php else: ?>code names containing <?php endif; ?>"<?= e( $get_data['q'] ) ?>"</h2>
<?php if( count( $code ) === 0 ): ?>
<p>No results</p>
<?php else: ?>
<?php require( DIR_VIEWS . '/list.php' ) ?>
<?php endif; ?>