<?php $this->layout('admin/layout'); ?>
<?php
$categories = getCategories();
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Редактировать запись</div>
    <div class="card-body">
        <form action="/admin/update/<?=$post['id'] ?>" method="post"  enctype="multipart/form-data">
            <div class="form-group my-3">
                <label>Название</label>
                <input type="text" class="form-control" name="title" value="<?=$post['title'] ?>">
            </div>
            <div class="form-group">
                <label>Контент</label>
                <textarea name="content" class="form-control"><?=$post['content'] ?></textarea>
            </div>
            <div class="form-group my-3">
                <label>Категория</label>
                <select class="form-control" name="category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?=$category['id'] ?>" <?=($post['id_category'] == $category['id']) ? 'selected' : '' ?>> <?=$category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label>Изображение</label><br>
            <img width="250" src="<?=getImage($post['image']) ?>" alt="">
            <input type="hidden" name="oldImage" value="<?=getImage($post['image']) ?>">
            <div class="custom-file my-3">
                <input type="file" class="custom-file-input" id="customFile" name="file">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-warning">Редактировать запись</button>
            <a href="/" class="btn btn-info">Отмена</a>
        </form>
    </div>
</div>