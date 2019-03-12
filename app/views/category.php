<?php $this->layout('layout'); ?>

<div class="col-lg-9">
    <h2 class="mb-4">Записи по категориям</h2>
    <h5 class="mb-4">Категория : <i><?=$category_name; ?></i></h5>
    <div class="row">
        <?php foreach ($categoryView as $category): ?>
        <div class="col-12">
            <div class="post mb-4">
                <div class="post-image mr-3 ">
                    <a href="/post/<?=$category['id']?>">
                        <img src="<?=getImage($category['image']) ?>" alt="">
                    </a>
                </div>
                <div class="post-content">
                    <h4><a href="/post/<?=$category['id']?>"><?=$category['title'] ?></a></h4>
                    <p><?=$category['content'] ?></p>
                    <p>Запись добавлена: <b><?=$category['date'] ?></b></p>
                    <p>Автор:
                        <b><?php echo getUserName($category['id_user']); ?></b>
                    </p>
                    <a href="/post/<?=$category['id']?>" class="btn btn-primary">Read Post</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
    <?php require "../app/views/partials/pagination.php"?>
</div>
