<?php $this->layout('admin/layout'); ?>
<a href="./add_user.html" class="btn btn-success my-3">Добавить пользователя</a>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Пользователи</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Логин</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th style="width: 15%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Makc</td>
                    <td>makc@mail.ru</td>
                    <td>Администратор</td>
                    <td class="d-flex justify-content-between">
                        <a href="./delete.html" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Makc</td>
                    <td>makc@mail.ru</td>
                    <td>Администратор</td>
                    <td class="d-flex justify-content-between">
                        <a href="./delete.html" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Makc</td>
                    <td>makc@mail.ru</td>
                    <td>Администратор</td>
                    <td class="d-flex justify-content-between">
                        <a href="./delete.html" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>