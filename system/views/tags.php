<h2 class="title">Tags</h2>
<table class="large-12 columns">
    <thead>
        <th>Name</th>
        <th>Count</th>
    </thead>
    <tbody>
    <?php foreach( $tags as $tag ): ?>
        <tr>
            <td><a href="/tag/<?= e( $tag->tag ) ?>/"><?= e( $tag->tag ) ?></a></td>
            <td><?= e( $tag->count ) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>