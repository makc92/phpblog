<?php $this->layout('admin/layout'); ?>
<a href="./add_category.html" class="btn btn-success my-3">Добавить категорию</a>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Все категории</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th style="width:8%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Lorem, ipsum dolor.</td>
                    <td class="d-flex justify-content-between">
                        <a href="./edit_categoty.html" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="./delete.html" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
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