<ul class="pagination justify-content-center">

    <?php if ($paginator->getPrevUrl()): ?>
        <li class="page-item"><a href="<?php echo $paginator->getPrevUrl(); ?>" class="page-link">&laquo; Предыдущие</a></li>
    <?php else: ?>
        <li class="page-item disabled"><a href="<?php echo $paginator->getPrevUrl(); ?>" class="page-link">&laquo; Предыдущие</a></li>
    <?php endif; ?>

    <?php foreach ($paginator->getPages() as $page): ?>
        <?php if ($page['url']): ?>
            <li <?php echo $page['isCurrent'] ? 'class="page-item active"' : ''; ?>>
                <a href="<?php echo $page['url']; ?>" class="page-link" ><?php echo $page['num']; ?></a>
            </li>
        <?php else: ?>
            <li class="page-item"><span><?php echo $page['num']; ?></span></li>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($paginator->getNextUrl()): ?>
        <li class="page-item"><a href="<?php echo $paginator->getNextUrl(); ?>" class="page-link">Следующие &raquo;</a></li>
    <?php else: ?>
        <li class="page-item disabled"><a href="<?php echo $paginator->getNextUrl(); ?>" class="page-link">Следующие &raquo;</a></li>
    <?php endif; ?>
</ul>
