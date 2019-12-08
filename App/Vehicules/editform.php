<?php
        include 'Vehicule.class.php';
        $vehicule = new Vehicule;
        if (!empty($_POST)) {
            $vehicule->updateVehicule($_POST['vid'], $_POST['Status'], $_POST['vehiculeMarque']);
            header('Location:index.php?notif=update');
            exit();
        } else {
            $showVehicule = $vehicule->showOneVehicule($_GET['vid']);
         $data = $showVehicule->fetch();
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

                        <h1 class="m-0 text-dark"><i class="fas fa-truck"></i> Véhicules</h1>
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
                                <h3 class="card-title">Modifier la Véhicule <?= $data['vid'] ?></h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">


                                <div class="col-lg-12">


                                </div>
                                <div class="sm-6">
                                    <div class="form-group">
                                        <label for="text">Matricule de La voiture</label>
                                        <input  value="<?= $data['vid'] ?>" disabled="disabled" required="required" class="form-control">
                                        <input id="vid" name="vid" value="<?= $data['vid'] ?>" placeholder="Ex : 2001659" type="hidden"  required="required" class="form-control">
                                    </div>

                                </div>
                                <div class="sm-6">
                                    <div class="form-group">
                                        <label for="text">Status</label>
                                        <div class="form-group">
                                            <select name="Status" id="Status" class="form-control">



                                                <option
                                                        <?php if (isset($data['Status'])) {
                                                            if ($data['Status'] == 1  ) echo "selected";
                                                        }?>
                                                        value="1">Disponible</option>
                                                <option
                                                    <?php if (isset($data['Status'])) {
                                                        if ($data['Status'] == 0 ) echo "selected";
                                                        }?>
                                                        value="0">En Panne</option>
                                                <option
                                                    <?php if (isset($data['Status'])) {
                                                        if ($data['Status'] == 2 ) echo "selected";
                                                        }?>
                                                        value="2">Occupé</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="text">Marque de La voiture</label>
                                    <input id="vehiculeMarque" name="vehiculeMarque" placeholder="Ex : BWM Série 5" value="<?= $data['vehiculeMarque'] ?>" type="text" required="required" class="form-control">
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