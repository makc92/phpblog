<ul class="pagination justify-content-end">
    <?php foreach ($paginator->getPages() as $page): ?>
        <?php if ($page['url']): ?>
            <li <?php echo $page['isCurrent'] ? 'class="page-item active"' : ''; ?>>
                <a href="<?php echo $page['url']; ?>" class="page-link" ><?php echo $page['num']; ?></a>
            </li>
        <?php else: ?>
            <li class="page-item"><span><?php echo $page['num']; ?></span></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<!--<ul class="d-flex list-unstyled">-->
<!--    <li class="mr-3">Всего найдено статей: --><?php //echo $paginator->getTotalItems(); ?><!-- </li>-->
<!--    <li>Показано  --><?php //echo $paginator->getCurrentPageFirstItem(); ?><!-- из --><?php //echo $paginator->getCurrentPageLastItem(); ?><!--.</li>-->
<!--</ul>-->
