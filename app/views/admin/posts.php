<?php $this->layout('admin/layout'); ?>
<a href="./add_post.html" class="btn btn-success my-3">Добавить запись</a>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
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
                    <? $category = getCategory($post['id_category']); ?>
                    <tr>
                        <td><?= $post['title']; ?></td>
                        <td>
                            <?= $post['content'] ?>
                        </td>
                        <td><?= $category['name']; ?></td>
                        <td>
                            <img width="100" src="<?= getImage($post['image']) ?>" alt="">
                        </td>
                        <td><?= $post['date'] ?></td>
                        <td style="width: 15%">
                            <a href="./edit_post.html" class="btn btn-warning">
                                Изменить
                            </a>
                            <a href="./delete.html" class="btn btn-danger">
                                Удалить
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php require "../app/views/partials/paginationAdmin.php" ?>
            <!--            <ul class="pagination justify-content-end">-->
            <!--                <li class="page-item disabled">-->
            <!--                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>-->
            <!--                </li>-->
            <!--                <li class="page-item"><a class="page-link" href="#">1</a></li>-->
            <!--                <li class="page-item active" aria-current="page">-->
            <!--                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
            <!--                </li>-->
            <!--                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link" href="#">Next</a>-->
            <!--                </li>-->
            <!--            </ul>-->
        </div>
    </div>
</div>