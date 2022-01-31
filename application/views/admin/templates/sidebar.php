  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link">
      <img src="<?php echo base_URL()?>/assets/dist/img/amikom.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UAY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="<?php echo base_URL()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nama; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>admin/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>admin/item" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Item
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>admin/pengunjung" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengunjung
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>admin/peminjaman" class="nav-link">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    <!-- Button trigger modal -->
          <a href="<?php echo base_url()?>c_apps/logout/">            
            <button type="button" class="btn btn-primary">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              Logout
            </button>
          </a>

            
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php  echo base_url() ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

