<?php if( isset( $error ) ): ?>
<?php require( DIR_VIEWS . '/error.php' ) ?>
<?php endif; ?>
<form action="" method="post">
    <fieldset>
        <div class="form-row">
            <label for="">Name</label>
            <input type="text" name="name" value="<?php if( isset( $form_data->name ) ): ?><?= e( $form_data->name ) ?><?php endif; ?>">
        </div>
        <div class="form-row">
            <label for="">Language</label>
            <select name="language">
                <option value=""></option>
                <?php foreach( $languages as $language => $language_data ): ?>
                <option value="<?= $language ?>"<?php if( isset( $form_data->language ) && $language == $form_data->language ): ?> selected<?php endif; ?>><?= e( $language_data['name'] ) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row">
            <label for="">Tags</label>
            <input type="text" name="tags" placeholder="tag1, tag2, tag3" value="<?php if( isset( $form_data->tags ) ): ?><?= e( $form_data->tags ) ?><?php endif; ?>">
        </div>
        <div style="clear:left">
            <label for="">Code</label>
            <textarea id="code" name="code"><?php if( isset( $form_data->code ) ): ?><?= e( $form_data->code ) ?><?php endif; ?></textarea>
        </div>
        <div>
            <input type="submit" value="Submit" name="submit">
        </div>
    </fieldset>
</form>