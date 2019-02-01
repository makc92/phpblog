<?php $this->insert('admin/partials/header') ?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->insert('admin/partials/sidebar') ?>

    <div id="content-wrapper">

        <div class="container-fluid">
            <?=$this->section('content')?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->insert('admin/partials/footer') ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


</body>

</html>