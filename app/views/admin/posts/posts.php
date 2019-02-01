<?php $this->layout('admin/layout'); ?>
<a href="/admin/posts/create_post" class="btn btn-success my-3">Добавить запись</a>
<div class="card mb-3">
    <?=flash(); ?>
    <div class="card-header">
        <i class="fa fa-table"></i>
        Все записи
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Контент</th>
                    <th>Категория</th>
                    <th>Изображение</th>
                    <th>Дата публикации</th>
                    <th style="width: 8%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post): ?>
                    <?php $category = getCategory($post['id_category']); ?>
                    <tr>
                        <td><?= $post['title']; ?></td>
                        <td>
                            <?= $post['content'] ?>
                        </td>
                        <td><?= $category['name']; ?></td>
                        <td>
                            <img width="100" height="50" src="<?= getImage($post['image']) ?>" alt="">
                        </td>
                        <td><?= $post['date'] ?></td>
                        <td style="width: 15%">
                            <a href="/admin/edit/<?=$post['id']; ?>" class="btn btn-warning">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="/admin/delete/<?=$post['id']; ?>" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php require "../app/views/partials/paginationAdmin.php" ?>
        </div>
    </div>
</div>