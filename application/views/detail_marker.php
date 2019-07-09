<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Soft Themez - Software Landing Page Template">
  <meta name="keywords" content="Software, Bootstrap4, modern, flat style, responsive, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
  <meta name="author" content="Askbootstrap">
  <title><?php echo $title; ?></title>
  <!-- Favicon Icon -->
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/billboard.png">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>public/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url() ?>public/home/vendor/font/css/fontawesome-all.css" rel="stylesheet">
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/home/vendor/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/home/vendor/owlcarousel/assets/owl.theme.default.min.css">
  <!-- Animate CSS  -->
  <link href="<?php echo base_url() ?>public/home/vendor/animate/animate.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>public/home/css/osahan.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>public/home/css/multi-page.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/ionicons/css/ionicons.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>public\admin\modules\adminlte/bootstrap.min.css">  -->
  <?php echo $map['js'] ?>
</head>
<body id="page-top">
  <!-- Modal Login-->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">

       <h5 class="modal-title" id="exampleModalLabel">SIGN IN</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     <form action="<?php echo base_url('user/auth') ?>" method="POST" role="form">
      <div class="form-group">
       <label for="exampleInputEmail1">Email address / Username</label>
       <input type="text" class="form-control" id="exampleInputEmail1" name="identity" aria-describedby="emailHelp" placeholder="Enter email / Username">
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     </div>
     <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
       <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
     </div>
     <button type="submit" class="btn btn-primary btn-block">Submit</button>
     <button type="submit" data-dismiss="modal" data-toggle="modal" data-target="#modal_register" href="#" class="btn btn-info btn-block"> Register</button>
   </form>

 </div>
</div>
</div>
</div>
<!-- End Modal Login -->

<header class="bg-primary text-white">
 <nav class="navbar navbar-expand-lg" id="mainNav">
  <div class="container">
   <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-fluid" src="<?php echo base_url() ?>public/home/img/logo1.png" alt=""></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
     <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url() ?>"> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="#" data-toggle="modal" data-target='#modal-about' class="hvr-underline-reveal">About Us</a>
    </li>
    
    <li class="nav-item">
     <?php if ($this->session->userdata("role")=="Admin") : ?>
      <a class="menu-btn" href="<?php echo base_url('admin') ?>" ><i class="fa fa-user-circle"></i> Kembali ke Dashboard</a>
      <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
        <a class="menu-btn" href="<?php echo base_url('buyer') ?>" ><i class="fa fa-user-circle"></i> Kembali ke Dashboard</a>
        <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
          <a class="menu-btn" href="<?php echo base_url('seller') ?>" ><i class="fa fa-user-circle"></i> Kembali ke Dashboard</a>
          <?php elseif($this->session->userdata("role")!="Admin") : ?>
           <a class="menu-btn" data-toggle="modal" data-target="#login" href="#"><i class="fa fa-user-circle"></i> Masuk</a>
           <?php elseif($this->session->userdata("role")!="Penyewa") : ?>
             <a class="menu-btn" data-toggle="modal" data-target="#login" href="#"><i class="fa fa-user-circle"></i> Masuk</a>
             <?php elseif($this->session->userdata("role")!="Pemilik Media") : ?>
              <a class="menu-btn" data-toggle="modal" data-target="#login" href="#"><i class="fa fa-user-circle"></i> Masuk</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<section class="inner-header-block">
 <div class="container">
  <div class="row">
   <div class="col-md-12 mx-auto text-center"  >
    <h1><?php echo $reklame->name ?></h1>
    <p class="mt-1 mb-0" style=" font-size: 19px"><?php echo $reklame->address ?></p>
  </div>
</div>
</div>
</section>

<section class="team-block" id="team">
 <div class="container">
  <div class="row">
   <div class="col-md-10 offset-md-1">
    <div class="map-view"><?php echo $map['html'] ?></div>

    <div class="section-title text-center wow animated zoomIn" style="margin-top: 20px;">
      <span class="badge badge-primary">Detail</span>
      <h3>Maps Detail</h3>
      <span class="section-title-line"></span>
    </div>
    
    
  </div>
  
  <div class="col-md-12">
    <p style="text-align: center; font-size: 15px;"><?php echo $reklame->description ?></p>
    <div class="row" style="margin: 40px 0;">
      <div class="col-md-6">
       <table class="table">
        <tr>
         <td><b>Status</b></td>
         <td>:</td>
         <td style="color:navy"><h6><?php echo $reklame->status ?><h6></td>
         </tr>
         <tr>
           <td><b>Orientasi</b></td>
           <td>:</td>
           <td><?php echo $reklame->orientasi ?></td>
         </tr>
         <tr>
           <td><b>Ukuran</b></td>
           <td>:</td>
           <td><?php echo $reklame->ukuran ?></td>
         </tr>
         
       </table>
     </div>
     <div class="col-md-6">
       <table class="table">
        <tr>
         <td><b>Harga Sewa</b></td>
         <td>:</td>
         <td>Rp. <?php echo number_format($reklame->price) ?>,-/bulan</td>
       </tr>
       <tr>
         <td><b>Fasilitas</b></td>
         <td>:</td>
         <td><?php echo $reklame->amenities ?></td>
       </tr>
       <tr>
         <td><b>Lighting</b></td>
         <td>:</td>
         <td><?php echo $reklame->lighting ?></td>
       </tr>
       
     </table>
   </div>
   
 </div>
 
 <center><a href="<?php echo $reklame->link ?>" class="btn btn-primary btn-sm" style="align-item:center" target="_blank">Go to Website</a>
  <a href="https://maps.google.com/maps?q=<?php echo $reklame->latitude ?>%2C<?php echo $reklame->longitude ?>" class="btn btn-default btn-sm" style="align-item:center" target="_blank"><i class="far fa-route"></i> Routes</a>
  <?php if ($this->session->userdata("role")=="Admin" && $reklame->status == "Tersedia") : ?>
   <a  data-toggle="modal" data-target="#modal_order" href="#" class="btn btn-primary btn-sm" style="align-item:center" target="_blank">Order</a>
   <?php elseif ($this->session->userdata("role")=="Penyewa" && $reklame->status == "Tersedia") : ?>
     <a  data-toggle="modal" data-target="#modal_order" href="#" class="btn btn-primary btn-sm" style="align-item:center" target="_blank">Order</a>
     <?php elseif ($this->session->userdata("role")=="Pemilik Media" && $reklame->status == "Tersedia") : ?>
       <a  data-toggle="modal" data-target="#modal_order" href="#" class="btn btn-primary btn-sm" style="align-item:center" target="_blank">Order</a>
       <?php elseif ($this->session->userdata("role")=="Admin" || $reklame->status == "Tidak Tersedia") : ?>

        <?php elseif ($this->session->userdata("role")=="Penyewa" || $reklame->status == "Tidak Tersedia") : ?>

          <?php elseif ($this->session->userdata("role")=="Pemilik Media"  || $reklame->status == "Tidak Tersedia") : ?>
           <?php endif; ?>

         </center>

         <!-- ================= ORDER ====================== -->
         <div class="modal fade" id="modal_order" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Order | Invoice</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              </div>
              <form class="form-horizontal" action="<?php echo base_url().'Detail/addorder'; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <input name="no_invoice" class="form-control" value="<?php echo $invoice;?>" type="text"readonly>
                      </div><div class="col-md-6">
                        <input name="tgl_pesan" class="form-control" value="<?php echo tanggal() ?>" type="text"  readonly>
                      </div>
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo number_format($reklame->price) ?>" aria-label="Amount (to the nearest dollar)" readonly>
                    <div class="input-group-append">
                      <span class="input-group-text">/Sewa</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-3" >Deskripsi</label>
                    <div class="col-xs-8 ">
                      <textarea name="description" style="margin-top: 0px; margin-bottom: 0px; height: 173px;" class="form-control" value="<?php echo set_value('description') ?>" type="text" placeholder="Deskripsi isi iklan yang akan di tampilkan" required></textarea>
                      <p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>

                      <?php $id = $this->session->userdata('email');
                      $this->db->select('userId')
                      ->FROM('users')
                      ->where('email',$id);
                      $query = $this->db->get()->result();
                      foreach ($query as $q) {
                # code...
                        $q->userId;
                      }
                      ?>

                      <input name="id_user" class="form-control" value="<?php echo $q->userId ?>" type="hidden" readonly>
                      <input name="id_reklame" class="form-control" value="<?php echo $reklame->ID ?>" type="hidden" readonly>
                      <input name="status_order" class="form-control" value="0" type="hidden" readonly>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Foto Sample Iklan :</label>
                    <div class="col-xs-8 ">
                      <input type="file" name="photo_order">
                    </div>
                  </div>


                </div>

                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Order</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ================ END ORDER =================== -->



      </div>
    </div>
  </div>
</section>

<section class="screens-block bg-primary" id="screens">
  <div class="screens-container-fluid">
    <div class="section-title text-center wow animated zoomIn">
      <span class="badge badge-white text-white">Foto</span>
      <h2 class="text-white">Foto Reklame</h2>
      <span class="section-title-line section-title-line line-white"></span>
    </div>
    <div class="screens-row text-center">
      <div class="screens owl-carousel owl-theme">
        <?php 
        $id_reklame = $reklame->ID;
        $screenshot = $this->db->query("SELECT * from foto_reklame where id_reklame = $id_reklame")->result();
        foreach ($screenshot as $c) {
                       # code...
          ?>
          <div class="item">
           <img src="<?php echo base_url() ?>public/image/foto_reklame/thum/<?php echo $c->foto ?>" class="img-responsive">
           <div style="margin-top: 20px;">
            <span style="color: white;font-size: 19px"><?php echo $c->keterangan ?></span>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>


<div class="modal fade" id="modal-about" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">About Us</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
   <p>Sistem Informasi Geografis ini dibangun dengan PHP (Framework Codeigniter 3), Google Maps V3 API dan Twitter bootstrap, Dibuat selain demi memenuhi tugas Mata Kuliah <i>Geographic Information System</i> diharapkan juga dapat menjadi referensi bagi agan-agan yang ingin membuat GIS</p>
   <table class="table table-striped">
    <tbody>
     <tr>
      <td>Nama Pengembang</td>
      <td width="50" class="text-center">:</td>
      <td>Amiin Rosyid</td>
    </tr>
    <tr>
      <td>Website</td>
      <td width="50" class="text-center">:</td>
      <td><a href="http://sig.amiin.site">http://sig.amiin.site</a></td>
    </tr>

    <tr>
      <td>Alamat</td>
      <td width="50" class="text-center">:</td>
      <td><a href="#">Jl. Pasir Putih, Pasir Putih, Rangkui, Kota Pangkal Pinang</a></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td width="50" class="text-center">:</td>
      <td><a href="https://api.whatsapp.com/send?phone=628883558303&text=Halo, Amiin Rosyid, saya mau tanya-tanya mengenai SIG nya">0888-355-8303</a></td>
    </tr>
  </tbody>
</table> 
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<footer class="py-5 text-center " >
 <div class="" style="padding: 0px;">
            <!--<div class="social-icons mb-3">
               <a href="#"><i class="fab fa-behance"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
               <a href="#"><i class="fab fa-facebook"></i></a>
               <a href="#"><i class="fab fa-google-plus"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-linkedin"></i></a>
               <a href="#"><i class="fab fa-pinterest"></i></a>
               <a href="#"><i class="fab fa-skype"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-youtube"></i></a>
             </div>-->
             <p class="mt-0 mb-0">&copy; Copyright 2019 Mochamad Nurjaman. All Rights Reserved</p>
             <p class="mt-0 mb-0"> Made with <i class="fas fa-heart heart-icon"></i> by
               <a class="text-primary"  target="_blank" href="https://askbootstrap.com/">Ask Bootstrap</a>
             </p>
           </div>
         </footer>
         <!-- Bootstrap core JavaScript -->
         <script src="<?php echo base_url() ?>public/home/vendor/jquery/jquery.min.js"></script>
         <script src="<?php echo base_url() ?>public/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- Plugin JavaScript -->
         <script src="<?php echo base_url() ?>public/home/vendor/jquery-easing/jquery.easing.min.js"></script>
         <!-- Scrolling Nav JavaScript -->
         <script src="<?php echo base_url() ?>public/home/vendor/scrolling-nav/scrolling-nav.js"></script>
         <!-- Contact Form JavaScript -->
         <script src="<?php echo base_url() ?>public/home/vendor/contact/jqBootstrapValidation.js"></script>
         <script src="<?php echo base_url() ?>public/home/vendor/contact/contact_me.js"></script>
         <!-- Owl Carousel javascript -->
         <script src="<?php echo base_url() ?>public/home/vendor/owlcarousel/owl.carousel.js"></script>
         <!-- WOW JavaScript -->
         <script src="<?php echo base_url() ?>public/home/vendor/animate/wow.min.js"></script>
         <!-- Custom JavaScript -->
         <script src="<?php echo base_url() ?>public/home/vendor/custom/custom.js"></script>
       </body>
       </html>