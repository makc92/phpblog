<?php $this->layout('admin/layout'); ?>
<a href="./add_user.html" class="btn btn-success my-3">Добавить пользователя</a>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Пользователи</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Логин</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th style="width: 15%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?=$user['username'] ?></td>
                    <td><?=$user['email'] ?></td>
                    <td>Администратор</td>
                    <td style="width: 15%">
                        <a href="" class="btn btn-danger">
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