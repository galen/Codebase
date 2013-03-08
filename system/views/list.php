<?php include( DIR_VIEWS . '/pagination.php' ) ?>

<table class="code-list">
    <thead>
        <th>Name</th>
        <th>Language</th>
        <th>Tags</th>
        <th class="centered">Modified</th>
        <th class="centered">Created</th>
        <th class="centered">Actions</th>
    </thead>
    <tbody>
    <?php foreach( $code as $c ): ?>
        <tr>
            <td><a href="/code/<?= e( $c->id ) ?>/<?= e( string_to_url( $c->name ) ) ?>/"><?= e( $c->name ) ?></a></td>
            <td><?php if( $c->language ): ?><a href="/language/<?= e( $c->language ) ?>/"><?= e( $languages[$c->language]['name'] ) ?></a><?php else: ?><?php endif; ?></td>
            <td>
                <ul class="tag-list">
                <?php foreach( $c->tags as $tag ): ?>
                    <li><a href="/tag/<?= e( $tag ) ?>/"><?= e( $tag ) ?></a></li>
                <?php endforeach; ?>
                </ul>
            </td>
            <td><?= e( tstamp_long( $c->modified ) ) ?></td>
            <td><?= e( tstamp_long( $c->created ) ) ?></td>
            <td>
                <ul class="code-actions" data-name="<?= e( $c->name ) ?>" data-id="<?= e( $c->id ) ?>" data-locked="<?php if( $c->lock ): ?>1<?php else: ?>0<?php endif; ?>" data-starred="<?php if( $c->star ): ?>1<?php else: ?>0<?php endif; ?>">
                    <li><a href="/edit/<?= e( $c->id ) ?>/<?= e( string_to_url( $c->name ) ) ?>/" title="Edit"><i class="foundicon-edit"></i></a></li>
                    <li><a href="#" title="Delete" class="delete-code"><i class="foundicon-trash"></i></a></li>
                    <li><a href="#" title="<?php if( $c->star ): ?>Remove star<?php else: ?>Star<?php endif; ?>" class="star-code<?php if( $c->star ): ?> starred<?php endif ?>"><i class="foundicon-star"></i></a></li>
                    <li><a href="#" title="<?php if( $c->lock ): ?>Unlock<?php else: ?>Lock<?php endif; ?>" class="lock-code<?php if( $c->lock ): ?> locked<?php endif ?>"><i class="foundicon-lock"></i></a></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include( DIR_VIEWS . '/pagination.php' ) ?>