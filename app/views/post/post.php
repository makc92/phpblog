<?php $this->layout('layout'); ?>
<?php $category = getCategory($post['id_category']); ?>
<div class="col-lg-9">
    <h2 class="mb-4">Запись : <i><?=  $post['title']; ?></i> </h2>
    <div class="row">
        <div class="col-12">
            <div class="post mb-4">
                <div class="post-image mr-3 ">
                    <img src="<?=getImage($post['image']) ?>" alt="">
                </div>
                <div class="post-content">
                    <h4><?= $post['title'] ?></h4>
                    <p><?= $post['content'] ?></p>
                    <p class="category">Категория: <b><?=$category['name'] ?></b></p>
                    <p>Автор:
                        <b><?php echo getUserName($post['id_user']); ?></b>
                    </p>
                    <p>Запись добавлена: <b><?=$post['date'] ?></b></p>
                </div>
            </div>
        </div>
    </div>
</div>

