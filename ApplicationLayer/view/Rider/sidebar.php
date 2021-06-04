<style type="text/css">
    .sidebar li .submenu{ 
    list-style: none; 
    margin: 0; 
    padding: 0; 
    padding-left: 1rem; 
    padding-right: 1rem;
}
</style>

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
    <a href="#" class="brand-link">
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
                        <a href="customerProfile.php" class="nav-link">
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

           <li class="nav-item has-submenu">
        <a class="nav-link" href="#"><i class="nav-icon fas fa-truck"></i>Delivery  </a>
        <ul class="submenu collapse">
            <li><a class="nav-link" href="deliveryList.php"> <i class="nav-icon fas fa-edit"></i>Delivery Request </a></li>
            <li><a class="nav-link" href="myDelivery.php"><i class="nav-icon far fa-bell"></i>My Delivery</a></li>
            
        </ul>
    </li>
     <li class="nav-item has-submenu">
        <a class="nav-link" href="#"><i class="nav-icon fas fa-house"></i>Pickup  </a>
        <ul class="submenu collapse">
            <li><a class="nav-link" href="pickupList.php"> <i class="nav-icon fas fa-edit"></i>Pickup Request </a></li>
            <li><a class="nav-link" href="myPickup.php"><i class="nav-icon far fa-bell"></i>My Pickup</a></li>
            
        </ul>
    </li>


               <!--  <li class="nav-item"> -->
                   <!--  <li><a class="nav-link" href="#">Submenu item 1 </a></li> -->
                    <!-- <a href="deliveryList.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Delivery Request</p>
                        <ul class="submenu collapse"> 
                        <li> <a class="nav-link" href="myDelivery.php"><i class="nav-icon far fa-bell"></i>My Delivery </a></li> -->

                    <!-- <a href="myDelivery.php" class="nav-link"> -->
                        <!-- <i class="nav-icon far fa-bell"></i>
                        <p>
                            My Delivery
                        </p> -->
                   <!--  </a>
                                       
                    </ul>
                    </a>

                </li> -->
                 

               <!--  <li class="nav-item">
                    <a href="pickupList.php" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>
                            Pickup Request
                        </p>
                    </a>
                </li> -->
               
              <!--   <li class="nav-item">
                    <a href="myPickup.php" class="nav-link">
                        <i class="nav-icon far fa-bell"></i>
                        <p>
                            My Pickup
                        </p>
                    </a>
                </li> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;    

        if(nextEl) {
            e.preventDefault(); 
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end
</script>