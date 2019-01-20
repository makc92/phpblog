<?php $categories = getCategories(); d($category);?>
<div class="col-lg-3">
    <h3>Категории записей</h3>
    <ul class="list-group">
        <?php foreach ($categories as $category): ?>
        <li class="list-group-item"><a href="/category/<?=$category['id']; ?>"><?=$category['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
