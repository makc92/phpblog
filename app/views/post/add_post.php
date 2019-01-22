<?php $this->layout('auth/layout'); ?>
<?php
$categories = getCategories();
$auth = auth();
?>

<div class="col-5">
    <h2 class="my-4">Добавить запись</h2>
    <?=flash(); ?>
    <form action="/add_post" method="post" enctype="multipart/form-data">
        <div class="form-group my-3">
            <input type="text" class="form-control" placeholder="title" name="title">
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" id="" placeholder="content"></textarea>
        </div>
        <div class="form-group my-3">
            <select class="form-control" name="category">
                <?php foreach ($categories as $category): ?>
                <option value="<?=$category['id'] ?>"><?=$category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="user" value="<?=$auth->getUserId();?>">
        <div class="custom-file my-3">
            <input type="file" class="custom-file-input" id="customFile" name="file">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <button type="submit" class="btn btn-primary">Добавить запись</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
</div>