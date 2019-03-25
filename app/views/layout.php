<?php $this->insert('partials/header') ?>
<main>
    <div class="container">
        <div class="row">
            <?= $this->section('content') ?>
            <?php $this->insert('partials/sidebar') ?>
        </div>
    </div>
</main>
<?php $this->insert('partials/footer') ?>
