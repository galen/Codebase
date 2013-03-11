<?php if( $pagination->total_pages > 1 ): ?>
<ul class="pagination">
    <?php if( $pagination->first_page_link ): ?><li class="first-page-warp"><a href="?page=1&<?php if( $page_name == 'search' ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=<?= $get_data['order_by'] ?>&order_dir=<?= $get_data['order_dir'] ?>">1...</a></li><?php endif; ?>
    <li class="prev-page"><?php if( $pagination->previous_page ): ?><a href="?page=<?= $pagination->previous_page ?>&<?php if( $page_name == 'search' ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=<?= $get_data['order_by'] ?>&order_dir=<?= $get_data['order_dir'] ?>">&larr;</a><?php endif; ?></li>
<?php foreach( $pagination->pages as $page ): ?>
    <li<?php if( $page == $current_page ): ?> class="current-page"<?php endif; ?>><?php if( $page != $current_page ): ?><a href="?page=<?= $page ?>&<?php if( $page_name == 'search' ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_by=<?= $get_data['order_by'] ?>&order_dir=<?= $get_data['order_dir'] ?>"><?php endif; ?><?= $page ?><?php if( $page != $current_page ): ?></a><?php endif; ?></li>
<?php endforeach; ?>
    <li class="next-page"><?php if( $pagination->next_page ): ?><a href="?page=<?= $pagination->next_page ?>&order_by=<?= $get_data['order_by'] ?>&<?php if( $page_name == 'search' ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_dir=<?= $get_data['order_dir'] ?>">&rarr;</a><?php endif; ?></li>
    <?php if( $pagination->last_page_link ): ?><li class="last-page-warp"><a href="?page=<?= $pagination->total_pages ?>&order_by=<?= $get_data['order_by'] ?>&<?php if( $page_name == 'search' ): ?>q=<?= e( $get_data['q'] ) ?>&t=<?= e( $get_data['t'] ) ?>&<?php endif; ?>order_dir=<?= $get_data['order_dir'] ?>">...<?= $pagination->total_pages ?></a></li><?php endif; ?>
</ul>
<?php endif; ?>