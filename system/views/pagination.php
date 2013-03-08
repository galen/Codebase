<?php if( $pagination->total_pages > 1 ): ?>
<ul class="pagination">
    <?php if( $pagination->first_page_link ): ?><li class="first-page-warp"><a href="?page=1">1...</a></li><?php endif; ?>
    <li class="prev-page"><?php if( $pagination->previous_page ): ?><a href="?page=<?= $pagination->previous_page ?>">&larr;</a><?php endif; ?></li>
<?php foreach( $pagination->pages as $page ): ?>
    <li<?php if( $page == $current_page ): ?> class="current-page"<?php endif; ?>><?php if( $page != $current_page ): ?><a href="?page=<?= $page ?>"><?php endif; ?><?= $page ?><?php if( $page != $current_page ): ?></a><?php endif; ?></li>
<?php endforeach; ?>
    <li class="next-page"><?php if( $pagination->next_page ): ?><a href="?page=<?= $pagination->next_page ?>">&rarr;</a><?php endif; ?></li>
    <?php if( $pagination->last_page_link ): ?><li class="last-page-warp"><a href="?page=<?= $pagination->total_pages ?>">...<?= $pagination->total_pages ?></a></li><?php endif; ?>
</ul>
<?php endif; ?>