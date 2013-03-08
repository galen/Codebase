<div id="code-masthead">
    <ul class="code-actions large" data-name="<?= e( $form_data->name ) ?>" data-id="<?= e( $form_data->id ) ?>" data-locked="<?php if( $form_data->lock ): ?>1<?php else: ?>0<?php endif; ?>" data-starred="<?php if( $form_data->star ): ?>1<?php else: ?>0<?php endif; ?>">
        <li><a href="/edit/<?= e( $form_data->id ) ?>/<?= e( string_to_url( $form_data->name ) ) ?>/" title="Edit"><i class="foundicon-edit"></i></a></li>
        <li><a href="#" title="Delete" class="delete-code"><i class="foundicon-trash"></i></a></li>
        <li><a href="#" title="<?php if( $form_data->star ): ?>Remove star<?php else: ?>Star<?php endif; ?>" class="star-code<?php if( $form_data->star ): ?> starred<?php endif ?>"><i class="foundicon-star"></i></a></li>
        <li><a href="#" title="<?php if( $form_data->lock ): ?>Unlock<?php else: ?>Lock<?php endif; ?>" class="lock-code<?php if( $form_data->lock ): ?> locked<?php endif ?>"><i class="foundicon-lock"></i></a></li>
    </ul>
    <h2 class="title"><?= e( $form_data->name ) ?></h2>
</div>

<?php include( DIR_VIEWS . '/code_form.php' ) ?>