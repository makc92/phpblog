<?php $this->layout('layout', ['title' => 'HomePage']); ?>

<div class="col-lg-9">
    <h2 class="mb-4"><?= $title; ?></h2>
    <div class="row">
        <?php foreach ($postsView as $post): ?>
        <div class="col-12">
            <div class="post mb-4">
                <div class="post-image mr-3 ">
                    <a href="/post/<?=$post['id']?>">
                        <img src="./img/post-bg.jpg" alt="">
                    </a>
                </div>
                <div class="post-content">
                    <h4><a href="/post/<?=$post['id']?>"><?=$post['title']?></a></h4>
                    <p><?=$post['content']?></p>
                    <p class="category"><a href="./category.html">category</a></p>
                    <p>Запись добавлена: <b><?=$post['date'] ?></b></p>
                    <a href="/post/<?=$post['id']?>" class="btn btn-primary">Читать запись</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
