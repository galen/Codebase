<?php include( DIR_VIEWS . '/pagination.php' ) ?>

<table class="code-list">
    <thead>
        <th><a href="?<?php if( isset( $results ) ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=name&order_dir=<?php if( $get_data['order_by'].$get_data['order_dir'] == 'nameasc' ): ?>desc<?php else: ?>asc<?php endif; ?>">Name<?php if( $get_data['order_by'] == 'name' ): ?><i class="foundicon-<?php if( $get_data['order_by'].$get_data['order_dir'] == 'nameasc' ): ?>up<?php else: ?>down<?php endif; ?>-arrow"></i><?php endif; ?></a></th>
        <th><a href="?<?php if( isset( $results ) ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=language&order_dir=<?php if( $get_data['order_by'].$get_data['order_dir'] == 'languageasc' ): ?>desc<?php else: ?>asc<?php endif; ?>">Language<?php if( $get_data['order_by'] == 'language' ): ?><i class="foundicon-<?php if( $get_data['order_by'].$get_data['order_dir'] == 'languageasc' ): ?>up<?php else: ?>down<?php endif; ?>-arrow"></i><?php endif; ?></a></th>
        <th>Tags</th>
        <th class="centered"><a href="?<?php if( isset( $results ) ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=modified&order_dir=<?php if( $get_data['order_by'].$get_data['order_dir'] == 'modifiedasc' ): ?>desc<?php else: ?>asc<?php endif; ?>">Modified<?php if( $get_data['order_by'] == 'modified' ): ?><i class="foundicon-<?php if( $get_data['order_by'].$get_data['order_dir'] == 'modifiedasc' ): ?>up<?php else: ?>down<?php endif; ?>-arrow"></i><?php endif; ?></a></th>
        <th class="centered"><a href="?<?php if( isset( $results ) ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=created&order_dir=<?php if( $get_data['order_by'].$get_data['order_dir'] == 'createdasc' ): ?>desc<?php else: ?>asc<?php endif; ?>">Created<?php if( $get_data['order_by'] == 'created' ): ?><i class="foundicon-<?php if( $get_data['order_by'].$get_data['order_dir'] == 'createdasc' ): ?>up<?php else: ?>down<?php endif; ?>-arrow"></i><?php endif; ?></a></th>
        <th class="centered">Actions</th>
    </thead>
    <tbody>
    <?php foreach( $code as $code_data ): ?>
        <tr>
            <td><a href="/edit/<?= e( $code_data->id ) ?>/<?= e( string_to_url( $code_data->name ) ) ?>/"><?= e( $code_data->name ) ?></a></td>
            <td><?php if( $code_data->language ): ?><a href="/language/<?= e( $code_data->language ) ?>/"><?= e( $languages[$code_data->language]['name'] ) ?></a><?php else: ?><?php endif; ?></td>
            <td>
                <ul class="tag-list">
                <?php foreach( $code_data->tags as $tag ): ?>
                    <li><a href="/tag/<?= e( $tag ) ?>/"><?= e( $tag ) ?></a></li>
                <?php endforeach; ?>
                </ul>
            </td>
            <td><?= e( tstamp_long( $code_data->modified ) ) ?></td>
            <td><?= e( tstamp_long( $code_data->created ) ) ?></td>
            <td>
                <?php require( DIR_VIEWS . '/code_actions.php' ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include( DIR_VIEWS . '/pagination.php' ) ?>