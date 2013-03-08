<h2 class="title">Languages</h2>
<table class="large-12 columns">
    <thead>
        <th>Language</th>
        <th>Count</th>
    </thead>
    <tbody>
    <?php foreach( $langs as $lang ): ?>
        <tr>
            <td><a href="/language/<?= e( $lang->language ) ?>/"><?= e( $lang->language ) ?></a></td>
            <td><?= e( $lang->count ) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>