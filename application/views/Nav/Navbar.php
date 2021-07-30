<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="p-3 text-white text-center">
        <img src="<?php echo base_url() ?>images\Logo\ATC-Full.png" alt="" class="img-fluid">
        <div class="row">
            <div class="col">
                <h1 class=" mx-auto">
                    GOHAN
                </h1>
            </div>
        </div>
    </div>
    <!-- Brand Logo -->
    <div class="container">
        <div class="row brand-link">
        </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Username : <?= $_SESSION['username'] ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item" <?= $_SESSION['Level'] == 0 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>Report" class="nav-link 
                                <?php echo $this->router->class . '/' . $this->router->fetch_method() === "Report" ? "active" : null; ?>">

                                <i class="far fa-calendar-alt"></i>
                                <p>Report</p>
                            </a>
                        </li>
                        <li class="nav-item" <?= $_SESSION['Level'] == 0 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>Report/Monthlyreport/<?= date("Y-m-d") ?>" class="nav-link 
                                <?php echo $this->router->class . '/' . $this->router->fetch_method() === "Report/Monthlyreport" ? "active" : null; ?>">
                                <i class="fas fa-chart-bar"></i>
                                <p>Monthly Report</p>
                            </a>
                        </li>
                        <li class="nav-item" <?= $_SESSION['Level'] == 0 ? 'hidden' : NULL ?>>

                            <a href="<?php echo base_url() ?>Booking/Booking_Choose/<?= date("Y-m-d") ?>" class="nav-link 
                            <?php

                            echo $this->router->class . '/' . $this->router->fetch_method() === "Booking/Booking_Choose" ? "active" : null; ?>">
                                <i class="fas fa-clipboard-check"></i>
                                <p>Booking Setup</p>
                            </a>
                        </li>
                        <li class="nav-item" <?= $_SESSION['Level'] == 1 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>Report" class="nav-link 
                                <?php echo $this->router->class . '/' . $this->router->fetch_method() === "Booking/Booking_Report" ? "active" : null; ?>">
                                <i class="fas fa-chart-bar"></i>
                                <p>Booking Report</p>
                            </a>
                        </li>
                        <li class="nav-item" <?= $_SESSION['Level'] == 1 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>Booking/index/<?= date("Y-m-d") ?>" class="nav-link 
                                <?php echo $this->router->class . '/' . $this->router->fetch_method() === "Booking/index" ? "active" : null; ?>">
                                <i class="fas fa-clipboard-check"></i>
                                <p>Booking</p>
                            </a>
                        </li>

                        <li class="nav-item" <?= $_SESSION['Level'] == 0 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>Setup" class="nav-link 
                            <?php echo $this->router->class === "Setup" ? "active" : null; ?>">
                                <i class=" fas fa-hamburger"></i>
                                <p>Master Menu</p>
                            </a>
                        </li>
                        <li class="nav-item" <?= $_SESSION['Level'] == 0 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>MasterMixer" class="nav-link
                            <?php echo $this->router->class === "MasterMixer" ? "active" : null; ?>">
                                <i class="fas fa-bacon"></i>
                                <p>Master Mixer</p>
                            </a>
                        </li>
                        <li class="nav-item" <?= $_SESSION['Level'] == 0 ? 'hidden' : NULL ?>>
                            <a href="<?php echo base_url() ?>ManageUser" class="nav-link
                            <?php echo $this->router->class === "ManageUser" ? "active" : null; ?>">
                                <i class="fas fa-user"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['logged_in'])) { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url() ?>logout" class="nav-link text-danger">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <p>Log out</p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url() ?>Login" class="nav-link">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <p>Log In</p>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>