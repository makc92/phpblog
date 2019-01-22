<?php $this->layout('auth/layout'); ?>
<div class="col-5">
    <?=flash() ?>
    <h2 class="my-4">Введите новый пароль</h2>
    <form action="/new_password" method="post">
        <div class="form-group">
            <input type="password" class="form-control" placeholder="password" name="password">
            <input type="hidden" name="selector" value="<?=$selector; ?>">
            <input type="hidden" name="token" value="<?=$token; ?>">
        </div>
        <button type="submit" class="btn btn-warning">Восстановить</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
</div>