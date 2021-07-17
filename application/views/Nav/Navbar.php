<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="p-3">
        <img src="<?php echo base_url() ?>images\Logo\ATC-Full.png" alt="" class="img-fluid">
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
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['username']?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Booking" class="nav-link 
                            <?php echo $this->router->class === "Booking" ? "active" : null; ?>">
                                <i class="fas fa-clipboard-check"></i>
                                <p>Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Setup" class="nav-link 
                            <?php echo $this->router->class === "Setup" ? "active" : null; ?>">
                                <i class=" fas fa-hamburger"></i>
                                <p>Master Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>MasterMixer" class="nav-link
                            <?php echo $this->router->class === "MasterMixer" ? "active" : null; ?>">
                                <i class="fas fa-bacon"></i>
                                <p>Master Mixer</p>
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