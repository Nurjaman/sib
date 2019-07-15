<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/fontawesome/css/all.min.css">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/billboard.png">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- CSS Libraries -->

  <!-- CSS Lightbox -->
  <link href="<?php echo base_url() ?>public/assets/galeri/css/lightbox.css" rel="stylesheet"/>




  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/css/components.css">
  <?php if(isset($map['js'])) echo $map['js']; ?>
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA --></head>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
              <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>

          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="<?php echo base_url() ?>"  class="nav-link   nav-link-lg nav-link-user">

              <div class="d-sm-none d-lg-inline-block">Kembali ke Maps</div></a>

            </li>

            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
               <?php $id = $this->session->userdata('email');
              $this->db->select('*')
              ->FROM('users')
              ->where('email',$id)
              ->limit(1);
              $query = $this->db->get()->result();
              foreach ($query as $q) : 
        
                ?>
               <img alt="image" src="<?php echo base_url("public/image/foto_user/{$q->photo_profile}") ?>" class="rounded-circle mr-1">
              <div class="d-sm  -none d-lg-inline-block">Hi,<?php echo $q->fullname;
 ?></div></a>
                <div class="dropdown-menu dropdown-menu-right">

                  <a href="<?php echo base_url('user/updateUser/'.$q->userId  ) ?>" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?php echo base_url('user/signout') ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
                </div>

              </li>
            </ul>
          </nav>
          <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a class="navbar-brand" href="<?php echo base_url() ?>admin"><img class="img-fluid" src="<?php echo base_url() ?>public/home/img/logohitam1.png" alt=""></a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="<?php echo base_url() ?>admin">SIG</a>
              </div>
              <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="<?php echo active_link_method('index', 'user') ?>">
                  <a href="<?php echo base_url('admin') ?>" class="nav-link  "><i class="fas fa-fire"></i><span>Buyyer</span></a>
                </li>
                <li class="menu-header">Tambah Data</li>
                <li class="<?php echo active_link_method('addreklame', 'admin') ?>">
                  <a href="<?php echo base_url('admin/addreklame') ?>" class="nav-link  "><i class="fas fa-plus"></i><span>Tambah Reklame</span></a>
                </li>
               

                <li class="menu-header">Data Master</li>
            
                <li class="<?php echo active_link_method('order', 'admin') ?>">
                  <a href="<?php echo base_url('admin/order') ?>" class="nav-link  "><i class="fas fa-database"></i><span>Data Pemesanan</span></a>
                </li>
   

                <li class="menu-header">Pengaturan</li>

                <li class="<?php echo active_link_method('updateuser1', 'user') ?>"><a class="nav-link" href="<?php echo base_url('user/updateuser1/'.$q->userId  ) ?>"><i class="fas fa-cog"></i> <span>Pengaturan Akun</span></a></li>

                


                <li class=""><a href="<?php echo base_url('user/signout') ?>" class="nav-link" ><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a></li>             

              </ul>
            <?php endforeach; ?>
          </aside>
        </div>