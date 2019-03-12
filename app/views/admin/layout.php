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

<script src="/js/jquery_3.2.1.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/bootsfileinput.js"></script>
<script src="/js/main.js"></script>
</body>

</html>