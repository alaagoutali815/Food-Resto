<?php
$ROOT = '../../';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="<?php echo $ROOT ?>/dist/img/logo_headline.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Restaurant Manager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $ROOT ?>/dist/img/alla.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alla Goutali</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="../../index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                    <!--                        <ul class="nav nav-treeview">-->
                    <!--                            <li class="nav-item">-->
                    <!--                                <a href="./index.html" class="nav-link active">-->
                    <!--                                    <i class="far fa-circle nav-icon"></i>-->
                    <!--                                    <p>Dashboard v1</p>-->
                    <!--                                </a>-->
                    <!--                            </li>-->
                    <!--                            <li class="nav-item">-->
                    <!--                                <a href="./index2.html" class="nav-link">-->
                    <!--                                    <i class="far fa-circle nav-icon"></i>-->
                    <!--                                    <p>Dashboard v2</p>-->
                    <!--                                </a>-->
                    <!--                            </li>-->
                    <!--                            <li class="nav-item">-->
                    <!--                                <a href="./index3.html" class="nav-link">-->
                    <!--                                    <i class="far fa-circle nav-icon"></i>-->
                    <!--                                    <p>Dashboard v3</p>-->
                    <!--                                </a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-shopping-basket"></i>
                        <p>
                            Commandes
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nouvelles Commandes <span class="right badge badge-danger">New</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Toutes les commandes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Commandes annulées</p>
                            </a>
                        </li>




                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-truck"></i>
                        <p>
                            Dilevery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Véhicules</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Historique Livrasion</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hamburger"></i>
                        <p>
                            Produits
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Catégories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Products" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-friends"></i>
                        <p>
                            Clients

                        </p>
                    </a>

                </li>                    <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Logout

                        </p>
                    </a>

                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>