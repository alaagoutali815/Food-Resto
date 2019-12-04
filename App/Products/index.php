

<?php include('../../includes/header.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <?php include('../../includes/nav.php') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include('../../includes/aside.php') ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0 text-dark"><i class="fas fa-hamburger"></i> Produits</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-2 float-right">
                        <a href="addform.php"><button type="button"  class="btn btn-block btn-primary .btn-sm float-right"> <i class="far fa-plus-square" href="add.php"></i> Ajouter Produit</button></a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-12 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tous Les Produits</h3>
                            </div>

                            <?php
                            require_once ('Product.class.php');
                            $menu = new Product;
                            $ProductList = $menu -> getProducts();
                            ?>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox"/></th>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Qunatité en Stock</th>
                                        <th>Catégorie</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
                                            while($data =$ProductList->fetch()){
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" value="<?= $data['pid'] ?>"</td>
                                        <td><img src="<?= $data['File'] ?>"/> <?= $data['Name'] ?></td>
                                        <td><?= $data['Price'] ?></td>
                                        <td><?= $data['stock_qte'] ?></td>
                                        <td><?= $data['Descr'] ?></td>
                                        <td>
                                            <a href="edit.php?pid=<?= $data['pid'] ?>"" class="btn btn-app"><i class="fas fa-edit"></i>Modifier</a>
                                            <a href="view.php?pid=<?= $data['pid'] ?>"" class="btn btn-app"><i class="fas fa-eye"></i>Consulter</a>
                                            <a href="delete.php?pid=<?= $data['pid'] ?>"" class="btn btn-app"><i class="fas fa-trash"></i>Supprimer</a>
                                        </td>


                                    </tr>
                                    <?php
}
?>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('../../includes/footer.php') ?>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>



<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>