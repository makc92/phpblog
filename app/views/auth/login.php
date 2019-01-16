<?php $this->layout('auth/layout'); ?>
<div class="col-6">
    <h2 class="my-4">Войти</h2>
    <?=flash() ?>
    <form action="/login" method="post">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
    <p class="my-3">Забыли пароль? <b><a href="/recovery_password">Восстановить пароль</a></b></p>
</div>