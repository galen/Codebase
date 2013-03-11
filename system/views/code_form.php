<?php if( isset( $error ) ): ?>
<p class="status-message error-message"><?= $error ?></p>
<?php endif; ?>
<form action="<?= $app->request()->getRootUri() ?><?= $app->request()->getResourceUri() ?>" method="post">
    <fieldset>
        <div class="form-3column">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php if( isset( $code_data->name ) ): ?><?= e( $code_data->name ) ?><?php endif; ?>">
        </div>
        <div class="form-3column">
            <label for="language-selector">Language</label>
            <select name="language" id="language-selector">
                <option value=""></option>
                <?php foreach( $languages as $language => $language_data ): ?>
                <option value="<?= $language ?>"<?php if( isset( $code_data->language ) && $language == $code_data->language ): ?> selected<?php endif; ?>><?= e( $language_data['name'] ) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-3column">
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" placeholder="tag1, tag2, tag3" value="<?php if( isset( $code_data->tags ) ): ?><?= e( $code_data->tags ) ?><?php endif; ?>">
        </div>
        <div class="text-preview-wrapper" data-editor="code_editor">
            <div id="code-wrapper">
                <label for="code">Code<a href="#" class="toggle toggle-preview">Toggle Preview</a><a href="#" class="toggle toggle-split">Toggle Split</a></label>
                <div id="code-editor-preview-wrapper">
                    <textarea id="code" name="code"><?php if( isset( $code_data->code ) ): ?><?= e( $code_data->code ) ?><?php endif; ?></textarea>
                </div>
            </div>
            <div id="code-preview" class="preview-container"></div>
        </div>
        <div>
            <input type="hidden" name="name_old" value="<?php if( isset( $code_data ) ): ?><?= e( $code_data->name ) ?><?php endif; ?>">
            <input type="submit" value=" <?php if( $page_name == 'edit' ): ?>Save<?php else: ?>Create<?php endif; ?> " name="submit">
        </div>
    </fieldset>
</form>