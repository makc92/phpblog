<?php $categories = getCategories();
?>
<div class="col-lg-3">
    <h3>Категории записей</h3>
    <ul class="list-group">
        <?php foreach ($categories as $category): ?>
            <?php if (countCategory($category['id']) > 0): ?>
                <li class="list-group-item"><a href="/category/<?= $category['name']; ?>"><?= $category['name'] ?></a>
                    <b> <?= countCategory($category['id']) ?></b></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>
