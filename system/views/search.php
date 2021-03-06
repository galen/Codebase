<h2 class="title">Search code</h2>

<div id="search-wrapper">

<div class="search-form">
    <h3>Search code names <span class="code-count">(<?= $code_count ?>)</span></h3>
    <form action="" method="get">
        <fieldset>
            <div>
                <label for="">Keywords</label>
                <input type="text" name="q">
            </div>
            <div>
                <input type="hidden" name="t" value="name">
                <input type="submit" value="Search">
            </div>
        </fieldset>
    </form>
</div>

<div class="search-form">
    <h3>Search code <span class="code-count">(<?= $code_count ?>)</span></h3>
    <form action="" method="get">
        <fieldset>
            <div>
                <label for="">Keywords</label>
                <input type="text" name="q">
            </div>
            <div>
                <input type="hidden" name="t" value="code">
                <input type="submit" value="Search">
            </div>
        </fieldset>
    </form>
</div>

<div class="search-form">
    <h3>Search tags <span class="code-count">(<?= $tags_count ?>)</span></h3>
    <form action="" method="get">
        <fieldset>
            <div>
                <label for="">Select tag</label>
                <select name="tag">
                    <option value=""></option>
                <?php foreach( $tags as $tag ): ?>
                    <option value="<?= e( $tag->tag ) ?>"><?= e( $tag->tag ) ?> (<?= $tag->count ?>)</option>
                <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="hidden" name="t" value="tag">
                <input type="submit" value="Search">
            </div>
        </fieldset>
    </form>

    <form action="" method="get" class="secondary-search">
        <fieldset>
            <div>
                <label for="">Enter tags <span class="instructions">Separate tags with commas</span></label>
                <input type="text" name="q">
            </div>
            <div>
                <input type="hidden" name="t" value="tags" placeholder="tag1, tag2, tag3">
                <input type="submit" value="Search">
            </div>
        </fieldset>
    </form>
</div>

<div class="search-form">
    <h3>Search languages <span class="code-count">(<?= $langs_count ?>)</span></h3>
    <form action="" method="get">
        <fieldset>
            <div>
                <label for="">Select language</label>
                <select name="language">
                    <option value=""></option>
                <?php foreach( $langs as $lang ): ?>
                    <?php if( isset( $languages[$lang->language] ) ): ?><option value="<?= e( $lang->language ) ?>"><?= e( $languages[$lang->language]['name'] ) ?> (<?= $lang->count ?>)</option><?php endif; ?>

                <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="hidden" name="t" value="language">
                <input type="submit" value="Search">
            </div>
        </fieldset>
    </form>
</div>

</div>