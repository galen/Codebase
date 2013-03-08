    <ul class="code-actions large" data-name="<?= e( $code_data->name ) ?>" data-id="<?= e( $code_data->id ) ?>" data-locked="<?php if( $code_data->lock ): ?>1<?php else: ?>0<?php endif; ?>" data-starred="<?php if( $code_data->star ): ?>1<?php else: ?>0<?php endif; ?>">
        <!--<li><a href="/edit/<?= e( $code_data->id ) ?>/<?= e( string_to_url( $code_data->name ) ) ?>/" title="Edit"><i class="foundicon-edit"></i></a></li>-->
        <li><a href="#" title="Delete" class="delete-code"><i class="foundicon-trash"></i></a></li>
        <li><a href="#" title="<?php if( $code_data->star ): ?>Remove Star<?php else: ?>Star<?php endif; ?>" class="star-code<?php if( $code_data->star ): ?> starred<?php endif ?>"><i class="foundicon-star"></i></a></li>
        <li><a href="#" title="<?php if( $code_data->lock ): ?>Unlock<?php else: ?>Lock<?php endif; ?>" class="lock-code<?php if( $code_data->lock ): ?> locked<?php endif ?>"><i class="foundicon-lock"></i></a></li>
    </ul>