<?php $this->insert('partials/header') ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <?=$this->section('content')?>
            </div>
        </div>
    </main>
<?php $this->insert('partials/footer') ?>