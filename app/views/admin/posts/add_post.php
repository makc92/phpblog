<?php $this->layout('admin/layout'); ?>
<?php
$categories = getCategories();
$auth = auth();
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Добавить запись
    </div>
    <div class="card-body">
        <form action="/admin/add_post" method="post" enctype="multipart/form-data">
            <div class="form-group my-3">
                <label>Название</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Контент</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <div class="form-group my-3">
                <label>Категория</label>
                <select class="form-control" name="category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="user" value="<?= $auth->getUserId(); ?>">
            <label>Изображение</label>
            <div class="custom-file my-3">
                <input type="file" class="custom-file-input" id="customFile" name="file">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-success">Добавить запись</button>
            <a href="/" class="btn btn-info">Отмена</a>
        </form>
    </div>
</div>