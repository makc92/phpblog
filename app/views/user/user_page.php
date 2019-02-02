<?php $this->layout('auth/layout'); ?>
<?php $auth = auth();
d($auth->getRoles())
?>
<div class="col-8">
    <?=flash(); ?>
    <h2 class="my-4">Панель пользователя:</h2>
    <ul>
        <li>Ваше имя : <i><?=$auth->getUsername() ?></i></li>
        <li>Ваш email : <i><?=$auth->getEmail() ?></i></li>
    </ul>
    <a href="/profile/user_post" class="btn btn-primary">Мои записи</a>
    <a href="/profile/userinfo" class="btn btn-info">Изменить данные профиля</a>
    <a href="/profile/password" class="btn btn-warning">Изменить пароль</a>
    <?php if($auth->hasRole(\Delight\Auth\Role::ADMIN)): ?>
        <a href="/admin" class="btn btn-success">Войти в админку</a>
    <?php endif; ?>
</div>