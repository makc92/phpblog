<?php $this->layout('layout'); ?>
<?php
d($postView)
?>
<div class="col-lg-9">
    <h2 class="mb-4">Запись : <i><?=  $postView['title']; ?></i> </h2>
    <div class="row">
        <div class="col-12">
            <div class="post mb-4">
                <div class="post-image mr-3 ">
                    <img src="/img/post-bg.jpg" alt="">
                </div>
                <div class="post-content">
                    <h4><?= $postView['title'] ?></h4>
                    <p><?= $postView['content'] ?></p>
                    <p class="category"><a href="/category.html">category</a></p>
                    <p>Запись добавлена: <b><?=$postView['date'] ?></b></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->insert('partials/sidebar') ?>