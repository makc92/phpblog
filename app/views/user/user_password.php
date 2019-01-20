<?php $this->layout('auth/layout'); ?>
<div class="col-5">
    <h2 class="my-4">Сбросить пароль</h2>
    <?=flash(); ?>
    <form action="/change_password" method="post">
        <div class="form-group my-3">
            <label for="pass">Текущий пароль</label>
            <input type="password" class="form-control" name="pass" id="pass">
        </div>
        <div class="form-group my-3">
            <label for="new_pass">Новый пароль</label>
            <input type="password" class="form-control" name="new_pass" id="new_pass">
        </div>
        <button type="submit" class="btn btn-warning">Изменить</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
</div>