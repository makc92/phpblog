<?php $this->layout('auth/layout'); ?>
<div class="col-6">
    <h2 class="my-4">Регистрация</h2>
    <form action="" method="post">
        <div class="form-group my-3">
            <input type="name" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироватся</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
</div>
