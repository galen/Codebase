<div id="code-masthead">
    <?php require( DIR_VIEWS . '/code_actions.php' ) ?>
    <h2 class="title"><?= e( $code->name ) ?></h2>
</div>
<?php if( isset( $edit_success) || isset( $_GET['edit'] ) ): ?><p class="status-message success-message">Edit sucessful</p><?php endif; ?>
<?php if( isset( $_GET['new'] ) ): ?><p class="status-message success-message">"<?= e( $code->name ) ?>" successfully created</p><?php endif; ?>
<?php include( DIR_VIEWS . '/code_form.php' ) ?>