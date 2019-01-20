<?php $this->layout('auth/layout'); ?>
<?php $auth = auth();
d($auth)
?>
<div class="col-8">
    <?=flash(); ?>
    <h2 class="my-4">Панель пользователя:</h2>
    <ul>
        <li>Ваше имя : <i><?=$auth->getUsername() ?></i></li>
        <li>Ваш email : <i><?=$auth->getEmail() ?></i></li>
    </ul>
    <a href="/user_post/add" class="btn btn-success">Добавить запись</a>
    <a href="/user_post" class="btn btn-primary">Мои записи</a>
    <a href="/profile/change" class="btn btn-info">Изменить данные профиля</a>
    <a href="/profile/password" class="btn btn-warning">Изменить пароль</a>
</div>