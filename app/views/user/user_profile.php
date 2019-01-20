<?php $this->layout('auth/layout'); ?>
<div class="col-5">
    <h2 class="my-4">Изменить данные профиля</h2>
    <?=flash(); ?>
    <form action="/profile/update/<?=$user_info['id']; ?>" method="post">
        <div class="form-group my-3">
            <label for="name">Имя</label>
            <input type="name" class="form-control" name="name" id="name" value="<?=$user_info['username'] ?>">
        </div>
        <div class="form-group my-3">
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=$user_info['email'] ?>">
        </div>
        <div class="form-group my-3">
            <label for="password">Подтвердите пароль</label>
            <input type="password"  class="form-control" name="password" id="password"">
        </div>
        <button type="submit" class="btn btn-warning">Изменить</button>
    </form>
</div>