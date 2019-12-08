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

        <?php if (isset($_GET['notif'])): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                if ($_GET['notif'] == 'add') echo 'Vehicule ajouté avec succés';
                if ($_GET['notif'] == 'update') echo 'Vehicule modifié avec succés';
                if ($_GET['notif'] == 'delete') echo 'Vehicule supprimé avec succés';
                ?>
            </div>
        <?php endif ?>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0 text-dark"><i class="fas fa-truck"></i> Véhicules</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-2 float-right">
                        <a href="addform.php"><button type="button"  class="btn btn-block btn-primary .btn-sm float-right"> <i class="far fa-plus-square" href="add.php"></i> Ajouter Véhicule</button></a>
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
                                <h3 class="card-title">Tous Les véhicules</h3>
                            </div>

                            <?php
                            require_once('Vehicule.class.php');
                            $vehicule = new Vehicule;
                            $VehiculesList = $vehicule->getVehicules();
                            ?>



                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Liste des Véhicules</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Marque</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data=$VehiculesList->fetch()){
                                            ?>
                                            <tr>
                                                <td><a href="editform.php?vid=<?= $data['vid'] ?>"><?= $data['vid'] ?></a></td>
                                                <td><?= $data['vehiculeMarque'] ?></td>
                                                <td>
                                                    <?php
                                                    if (isset($data['Status'])) {
                                                        if ($data['Status'] == 0) {
                                                            echo "<span class=\"badge badge-danger\">En Panne</span></td>";
                                                        } elseif ($data['Status'] == 1) echo "<span class=\"badge badge-success\">Disponible</span></td>";
                                                        else echo "<span class=\"badge badge-warning\">Occupé</span></td>";
                                                    }

                                                    ?>
                                                <td>
                                                    <a href="editform.php?vid=<?= $data['vid'] ?>" class="btn btn-app"><i class="fas fa-edit"></i>Modifier</a>
<!--                                                    <a href="view.php?vid=--><?//= $data['vid'] ?><!--"" class="btn btn-app"><i class="fas fa-eye"></i>Consulter</a>-->
                                                    <a onclick="return confirm('Voulez vous supprimer cet élement?');" href="delete.php?vid=<?= $data['vid'] ?>" class="btn btn-app delete-object"><i class="fas fa-trash"></i>Supprimer</a>
                                                </td>
                                            </tr>


                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>

                            <!-- /.card-header -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js"></script>



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

