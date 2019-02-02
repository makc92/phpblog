<?php $this->layout('admin/layout'); ?>
<a href="/admin/category/create" class="btn btn-success my-3">Добавить категорию</a>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Все категории</div>
    <div class="card-body">
        <?=flash(); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Название</th>
                    <th style="width:8%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?=$category['name'] ?></td>
                    <td style="width: 15%">
                        <a href="/admin/category/edit/<?=$category['id'] ?>" class="btn btn-warning mr-4">
                           Изменить
                        </a>
                        <a href="/admin/category/delete/<?=$category['id'] ?>" class="btn btn-danger">
                            Удалить
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>