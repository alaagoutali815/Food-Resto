<?php
if (!empty($_POST)) {
    require_once('Product.class.php');
    $product = new Product;
    $product->addProduct($_POST['pid'], $_POST['Name'],$_POST['Desription'],$_POST['Price'],$_POST['File'],$_POST['stock_qte']);
    header('Location:index.php?notif=add');
    exit();
}
?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


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
            <div class="container-fuild">
                <form method="post">
                    <div class="row mb-2">
                        <div class="col-sm-10">

                            <h1 class="m-0 text-dark"><i class="fas fa-hamburger"></i> Produits</h1>
                        </div><!-- /.col -->

                        <div class="col-sm-2 float-right">
                            <button type="submit" class="btn sticky-top btn-block btn-primary .btn-sm float-right"> <i class="far fa-save"></i> Enregistrer</button>

                        </div><!-- /.col -->
                    </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-12 align-self-lg-center connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ajouter un Produit</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">


                                <div class="col-lg-12">


                                </div>
                                <div class="form-group">
                                    <label for="text">Nom de Produit</label>
                                    <input id="Name" name="Name" placeholder="Ex : Pizza Neptune" type="text" required="required" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="textarea">Descreption</label>
                                    <textarea id="Desription" name="Desription" cols="40" rows="5" class="form-control"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'Desription' );
                                    </script>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Price">Prix</label>
                                            <div class="input-group">
                                                <input id="Price" name="Price" placeholder="Ex : 10DT" type="text" class="form-control">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">DT</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end form item -->

                                    </div>
                                    <!--end form item box -->
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="stock_qte">Quantité en Stock</label>
                                            <input id="stock_qte" name="stock_qte" placeholder="Ex : 5" type="text" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <label for="pid">PID</label>
                                            <input id="pid" name="pid" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="pid">Ajouter une image</label>
                                    <input id="File" name="File" type="file" class="form-control">
                                </div>




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
    </form>
</div><!-- /.container-fluid -->
</form>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('../../includes/footer.php') ?>



</script>