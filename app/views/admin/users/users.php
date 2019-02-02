<?php
$this->layout('admin/layout');
$admin = 1;
$bannUser = 2;
$normalUser = 0;
?>
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
                    <td style="width: 20%"><?=$user['username'];?>
                        <?php if($user['status']==$bannUser): ?>
                        <span class="banned">Забанен</span>
                        <?php endif; ?>
                    </td>
                    <td><?=$user['email'] ?></td>
                    <td><?=($user['roles_mask']==$admin)? 'Администратор' : 'Пользователь' ?></td>
                    <td style="width: 30%">
                        <?php if($user['roles_mask'] !=$admin): ?>
                            <?php if($user['status']== $normalUser): ?>
                            <a href="/admin/users/ban/<?=$user['id'] ?>" class="btn btn-warning">
                                Забанить
                            </a>
                            <?php else: ?>
                            <a href="/admin/users/unban/<?=$user['id'] ?>" class="btn btn-primary">
                                Разбанить
                            </a>
                            <?php endif; ?>
                            <a href="/admin/users/getAdmin/<?=$user['id']?>" class="btn btn-success">
                                Назначить администратором
                            </a>
                            <a href="" class="btn btn-danger">
                                Удалить
                            </a>
                        <?php else: ?>
                            <p>Администратор</p>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php require "../app/views/partials/paginationAdmin.php" ?>
        </div>
    </div>
</div>