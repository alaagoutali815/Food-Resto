<?php
include 'Order.class.php';
$order = new Order;
if (!empty($_POST)) {
    $order->AffectOrder($_POST['oid'], $_POST['vid']);
    header('Location:index.php?notif=affect');
    exit();
} else {
    $orderDetails = $order->showOneOrder($_GET['oid']);
    $data = $orderDetails->fetch();
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
                <form  enctype="multipart/form-data" method="post" action="">
                    <div class="row mb-2">
                        <div class="col-sm-10">

                            <h1 class="m-0 text-dark"><i class="fas fa-shopping-basket"></i> Commandes</h1>
                        </div><!-- /.col -->


                        <div class="col-sm-2 float-right">
                            <button type="submit" class="btn sticky-top btn-block btn-primary .btn-sm float-right"> <i class="far fa-save"></i> Affecter</button>

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
                                <h3 class="card-title">Affecter La commande <?= $data['oid'] ?></h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">


                                <div class="col-lg-12">


                                </div>
                                <div class="sm-6">
                                    <div class="form-group">
                                        <label for="text">Commande a traiter</label>
                                        <input  value="<?= $data['oid'] ?>" disabled="disabled" required="required" class="form-control">
                                        <input id="oid" name="oid" value="<?= $data['oid'] ?>" placeholder="Ex : 2001659" type="hidden"  required="required" class="form-control">
                                    </div>

                                </div>
                                <div class="sm-6">
                                    <div class="form-group">
                                        <label for="text">Véhicules Disponibles</label>

                                        <?php

                                        $VehiculesList = $order->getAvailbleVehicules();
                                        ?>



                                        <div class="form-group">
                                            <select name="vid" id="Status" class="form-control">
                                                    <?php

                                                    while($vehiculesData=$VehiculesList->fetch()){
                                                    ?>

                                                <option value="<?= $vehiculesData['vid'] ?>">  <?= $vehiculesData['vehiculeMarque'] ?></option>
                                                  <?php
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="text">Adresse a Livrer</label>
                                    <input id="vehiculeMarque" name="vehiculeMarque" placeholder="Adresse" value="" type="text" required="required" class="form-control">
                                </div>

                                <!--end form item box -->



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