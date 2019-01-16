<?php $this->layout('auth/layout'); ?>
<div class="col-5">
    <h2 class="my-4">Мой профиль</h2>
    <form action="" method="post">
        <div class="form-group my-3">
            <label for="name">Ваше имя</label>
            <input type="name" class="form-control" placeholder="Name" name="name" id="name">
        </div>
        <div class="form-group my-3">
            <label for="name">Ваше email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
        </div>
        <button type="submit" class="btn btn-warning">Изменить</button>
        <a href="/" class="btn btn-info">Отмена</a>
    </form>
    <p class="my-3"><a href="/user_password" >Изменить пароль</a></p>

</div>