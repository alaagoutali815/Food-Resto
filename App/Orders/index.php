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
                if ($_GET['notif'] == 'confirm') echo 'Vehicule ajouté avec succés';
                if ($_GET['notif'] == 'cancel') echo 'Commande annulé avec succés';
                if ($_GET['notif'] == 'affect') echo 'Vehicule affecté avec succés';
                ?>
            </div>
        <?php endif ?>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0 text-dark"><i class="fas fa-shopping-basket"></i> Commandes</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-2 float-right">
<!--                        <a href="addform.php"><button type="button"  class="btn btn-block btn-primary .btn-sm float-right"> <i class="far fa-plus-square" href="add.php"></i> Ajouter Véhicule</button></a>-->
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
                <?php
                require_once 'Order.class.php';
                $order = new Order();
                $valueCount = $order->getOrdersCount(0);
                $data = $valueCount->fetch();
                ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-light"><i class="fas fa-cart-plus"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Nouvelles commandes</span>
                                        <span class="info-box-number">

                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-clipboard-check"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Commandes Confirmés</span>
                                        <span class="info-box-number">  </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-times-circle"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Commandes Annulés</span>
                                        <span class="info-box-number">  </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-truck"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Livré</span>
                                        <span class="info-box-number"> </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Toutes les Commandes</h3>
                            </div>

                            <?php
                            require_once('Order.class.php');
                            $orders = new Order;
                            $odersList = $orders->getOrders();
                            ?>



                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Liste des Commandes</h3>

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
                                                <th>ID Commande</th>
                                                <th>Date</th>

                                                <th>Produit</th>
                                                <th>Commandé par </th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data=$odersList->fetch()){
                                            ?>
                                            <tr>
                                                <td><?= $data['oid'] ?></a></td>
                                                <td><?= $data['Odate'] ?></a></td>
                                                <td>
                                                    <?= "ProductID = ". $data['pid'] ?>
                                                   </td>
                                                <td>ClientID = <?= $data['cid'] ?></td>
                                                <td>
                                                    <?php
                                                    if (isset($data['Delivery_Status'])) {
                                                        if ($data['Delivery_Status'] == 0) {
                                                            echo "<span class=\"badge badge-light\">Nouvelle Commande</span></td>";
                                                        }
                                                         elseif ($data['Delivery_Status'] == 1) {
                                                             echo "<span class=\"badge badge-info\">Confirmé</span></td>";
                                                         }
                                                        elseif ($data['Delivery_Status'] == 2) {
                                                            echo "<span class=\"badge badge-success\">Commande Livré</span></td>";
                                                        }
                                                    elseif ($data['Delivery_Status'] == 3) {
                                                        echo "<span class=\"badge badge-warning\">Commande Annulée</span></td>";
                                                    }

                                                    } else
                                                        echo "<span class=\"badge badge-secondary\">Status Invalide</span></td>";

                                                    ?>
                                                <td>
                                                    <a onclick="return confirm('Voulez vous confirmer cette commande?');" href="confirm.php?oid=<?= $data['oid'] ?>" class="btn btn-app"><i class="far fa-check-circle"></i>Confirmer</a>
<!--                                                    <a href="view.php?vid=--><?//= $data['vid'] ?><!--"" class="btn btn-app"><i class="fas fa-eye"></i>Consulter</a>-->
                                                    <a onclick="return confirm('Voulez vous Annuler cette commande?');" href="cancel.php?oid=<?= $data['oid'] ?>" class="btn btn-app delete-object"><i class="far fa-times-circle"></i>Annuler</a>
                                                <?php

                                                if (isset($data['Delivery_Status'])) {
                                                    if ($data['Delivery_Status'] == 1) {
                                                    ?>
                                                        <a href="affect.php?oid=<?php echo $data['oid'] ?>"  class="btn btn-app delete-object"><i class="fas fa-truck"></i>Affecter Vehicule</a><?php

                                                }
                                                    }?>

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

