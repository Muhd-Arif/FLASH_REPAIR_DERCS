<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <a href="allRepairList.php" class="brand-link">
        <i class="far fa-tools" style="padding-left: 8%; padding-right: 1%"></i>
        <span class="brand-text font-weight-light">Flash Repair</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="adminProfile.php" class="nav-link">
                            <i class="far fa-user nav-icon"></i>
                            <p>My Account</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="adminValidateCustomer.php" class="nav-link">

                        <i class="nav-icon fas fa-edit"></i>
                        <p>Customer List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="adminValidateRunner.php" class="nav-link">

                      <i class="far fa-user nav-icon"></i>
                        <p>Rider List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="quotationList.php" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>
                            Customer Quotation
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="allRepairList.php" class="nav-link">
                        <i class="nav-icon far fa-bell"></i>
                        <p>
                            All Repairs
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>