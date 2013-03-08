<div id="code-header">
    <div id="code-masthead">
        <ul class="code-actions large" data-name="<?= e( $code->name ) ?>" data-id="<?= e( $code->id ) ?>" data-locked="<?php if( $code->lock ): ?>1<?php else: ?>0<?php endif; ?>" data-starred="<?php if( $code->star ): ?>1<?php else: ?>0<?php endif; ?>">
            <li><a href="/edit/<?= e( $code->id ) ?>/<?= e( string_to_url( $code->name ) ) ?>/" title="Edit"><i class="foundicon-edit"></i></a></li>
            <li><a href="#" title="Delete" class="delete-code"><i class="foundicon-trash"></i></a></li>
            <li><a href="#" title="<?php if( $code->star ): ?>Remove star<?php else: ?>Star<?php endif; ?>" class="star-code<?php if( $code->star ): ?> starred<?php endif ?>"><i class="foundicon-star"></i></a></li>
            <li><a href="#" title="<?php if( $code->lock ): ?>Unlock<?php else: ?>Lock<?php endif; ?>" class="lock-code<?php if( $code->lock ): ?> locked<?php endif ?>"><i class="foundicon-lock"></i></a></li>
        </ul>
        <h2 class="title"><?= e( $code->name ) ?></h2>
    </div>
    <dl class="code-attributes">
        <dt>Language</dt>
        <dd><?php if( isset( $languages[$code->language] ) ): ?><a href="/language/<?= e( $code->language ) ?>/"><?= e( $languages[$code->language]['name'] ) ?></a><?php else: ?>None<?php endif; ?></dd>
        <dt>Tags</dt>
        <dd>
            <?php if( count(  $code->tags) ): ?>
            <ul class="tag-list">
            <?php foreach( $code->tags as $tag ): ?>
                <li><a href="/tag/<?= e( $tag ) ?>/"><?= e( $tag ) ?></a></li>
            <?php endforeach; ?>
            </ul>
            <?php else: ?>
            None
            <?php endif; ?>
        </dd>
        <dt>Created</dt>
        <dd><?= e( tstamp_long( $code->created ) ) ?></dd>
        <dt>Modified</dt>
        <dd><?= e( tstamp_long( $code->modified ) ) ?></dd>
    </dl>
</div>

<?php if( $code->language == 'markdown' ): ?>
<?php echo $markdown_html ?>
<?php else: ?>    
<textarea id="code" name="code" disabled><?= e( $code->code ) ?></textarea>
<?php endif; ?>
<hr>
<a href="/edit/<?= e( $code->id ) ?>/<?= e( string_to_url( $code->name ) ) ?>/"><button>Edit</button></a>