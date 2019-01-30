<?php $this->layout('auth/layout'); ?>
<div class="col-lg-9">
    <h2 class="mb-4">Мои записи</h2>
    <?=flash(); ?>
    <a href="/profile/user_post/add" class="btn btn-success mb-4">Добавить запись</a>
    <div class="row">
        <?php foreach($user_posts as $post ): ?>
        <div class="col-12">
            <div class="post mb-4">
                <div class="post-image mr-3 ">
                    <img src="<?=getImage($post['image']) ?>" alt="">
                </div>
                <div class="post-content">
                    <h4><a href="/post/<?=$post['id']?>"><?=$post['title']; ?></a></h4>
                    <p><?=$post['content']; ?></p>
                    <a href="/user_post/edit/<?=$post['id'] ?>" class="btn btn-warning">Редактировать запись</a>
                    <a href="/user_post/delete/<?=$post['id'] ?>" onclick="return confirm('Вы уверены?')" class="btn btn-danger">Удалить запись</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php require "../app/views/partials/pagination.php"?>
</div>