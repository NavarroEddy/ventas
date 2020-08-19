<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/logo_dulce.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mi Dulce Ángel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/user5-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Aleida González</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Menú Principal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-dollar-sign"></i>
              <p>
                Realizar VENTA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Reportes</p>
            </a>ñ
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/Usuarios_controller" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Productos
                <span class="right badge badge-danger">2</span>
                <span class="right badge badge-warning">1</span>
                <!-- <span class="right badge badge-success">9</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Categorias</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/Clientes_controller" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Inventario</p>
            </a>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>  
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>