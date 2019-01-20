<?php $this->layout('auth/layout'); ?>
<?php  $categories = getCategories();
?>
<div class="col-5">
    <h2 class="my-4">Редактировать запись</h2>
    <?=flash(); ?>
    <form action="/user_post/update/<?=$post['id'] ?>" method="post">
        <div class="form-group my-3">
            <input type="text" class="form-control" placeholder="title" name="title" value="<?=$post['title'] ?>">
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" id="" placeholder="content"><?=$post['content'] ?></textarea>
        </div>
        <div class="form-group my-3">
            <select class="form-control" name="category">
                <?php foreach ($categories as $category): ?>
                    <option value="<?=$category['id'] ?>" <?=($post['id_category'] == $category['id']) ? 'selected' : '' ?>> <?=$category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
<!--        <div class="custom-file my-3">-->
<!--            <input type="file" class="custom-file-input" id="customFile" name="file">-->
<!--            <label class="custom-file-label" for="customFile">Choose file</label>-->
<!--        </div>-->
        <button type="submit" class="btn btn-warning">Редактировать запись</button>
        <a href="/user_post" class="btn btn-info">К моим записям</a>
    </form>
</div>