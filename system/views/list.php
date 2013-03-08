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