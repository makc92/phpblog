<?php $this->layout('admin/layout'); ?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Редактировать категорию
    </div>
    <div class="card-body">
        <form action="/admin/category/update/<?=$category['id'] ?>" method="post">
            <div class="form-group my-3">
                <label>Название</label>
                <input type="text" class="form-control" name="category" value="<?=$category['name'] ?>">
            </div>
            <button type="submit" class="btn btn-warning">Редактировать категорию</button>
            <a href="/" class="btn btn-info">Отмена</a>
        </form>
    </div>
</div>