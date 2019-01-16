<?php $this->layout('auth/layout'); ?>
<div class="col-6">
    <h2 class="my-4">Панель пользователя: <i><?=$username; ?></i></h2>
    <a href="/user_post" class="btn btn-success">Добавить запись</a>
    <a href="/user_post" class="btn btn-primary">Мои записи</a>
    <a href="/user_profile" class="btn btn-info">Управление профилем</a>
    <br><br>
    <a href="/" class="btn btn-info">на главную</a>

</div>