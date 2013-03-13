    <ul class="code-actions<?php if( $page_name == 'code' ): ?> code-page<?php endif; ?><?php if( $code_data->lock ): ?> locked<?php endif; ?><?php if( $code_data->star ): ?> starred<?php endif; ?>" data-name="<?= e( $code_data->name ) ?>" data-id="<?= e( $code_data->id ) ?>" data-locked="<?php if( $code_data->lock ): ?>1<?php else: ?>0<?php endif; ?>" data-starred="<?php if( $code_data->star ): ?>1<?php else: ?>0<?php endif; ?>">
        <?php if( $page_name != 'code' ): ?><li><a href="/code/<?= e( $code_data->id ) ?>/<?= e( string_to_url( $code_data->name ) ) ?>/" title="Edit"><i class="foundicon-edit"></i></a></li><?php endif; ?>
        <li><a href="#" title="<?php if( $code_data->star ): ?>Remove Star<?php else: ?>Star<?php endif; ?>" class="star-code"><i class="foundicon-star"></i></a></li>
        <li><a href="#" title="<?php if( $code_data->lock ): ?>Unlock<?php else: ?>Lock<?php endif; ?>" class="lock-code"><i class="foundicon-lock"></i></a></li>
        <li><a href="#" title="Delete" class="delete-code"><i class="foundicon-trash"></i></a></li>

    </ul>