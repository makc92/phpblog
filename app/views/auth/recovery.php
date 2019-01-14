<?php $this->layout('auth/layout'); ?>
<div class="col-5">
    <h2 class="my-4">Восстановить Пароль</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Восстановить</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
</div>