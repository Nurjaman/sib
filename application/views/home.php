

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
 <link href="vendor/font/css/fontawesome-all.css" rel="stylesheet">
 <!-- Owl Stylesheets -->
 <link rel="stylesheet" href="<?php echo base_url() ?>public/home/vendor/owlcarousel/assets/owl.carousel.min.css">
 <link rel="stylesheet" href="<?php echo base_url() ?>public/home/vendor/owlcarousel/assets/owl.theme.default.min.css">
 <!-- Animate CSS  -->
 <link href="<?php echo base_url() ?>public/home/vendor/animate/animate.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="<?php echo base_url() ?>public/home/css/osahan.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="<?php echo base_url() ?>public/home/css/multi-page.css" rel="stylesheet">
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
     <label for="exampleInputEmail1">Email address</label>
     <input type="text" required class="form-control" id="exampleInputEmail1" name="identity" aria-describedby="emailHelp" placeholder="Enter email">
     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
   </div>
   <div class="form-group">
     <label for="exampleInputPassword1">Password
      <a href="<?php echo base_url().'user/reset_password_email'; ?>" style="color:red"> <i>Lupa password?</i> </a>
     </label>
     <input type="password" name="password" class="form-control" required id="exampleInputPassword1" placeholder="Password">
   </div>
   <button type="submit" class="btn btn-primary btn-block">Submit</button>
   <button type="submit" data-dismiss="modal" data-toggle="modal" data-target="#modal_register" href="#" class="btn btn-info btn-block"> Register</button>

   <br>
   <!-- <a data-dismiss="modal" data-toggle="modal" data-target="#modal_lupas" href="#" >Lupa password </a> -->
  
 </form>


</div>
</div>
</div>
</div>
<!-- End Modal Login -->


<!-- Modal Register -->
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title" id="myModalLabel">Register</h3>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
   </div>
   <form class="form-horizontal" action="<?php echo base_url().'user/register'; ?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">

      <div class="form-group">
       <div class="row">
        <div class="col-md-6">
          <small id="emailHelp" class="form-text text-muted">Username :</small>
          <input name="username" value="<?php echo set_value('username') ?>"  placeholder="Username" class="form-control" >
          <p class="help-block"><?php  echo form_error('username', '<small class="text-red">', '</small>'); ?></p>
        </div><div class="col-md-6">
          <small id="emailHelp" class="form-text text-muted">Sebagai :</small>
          <select name="role"  value="<?php echo set_value('role') ?>" id="input" class="form-control">
           <option value="">---PILIH---</option>
           <option value="Penyewa">Penyewa</option>
           <option value="Pemilik Media">Pemilik Media</option>
         </select>
         <p class="help-block"><?php  echo form_error('role', '<small class="text-red">', '</small>'); ?></p>
       </div>
     </div>
   </div>

   <div class="input-group mb-3">
     <div class="input-group-prepend">
      <span class="input-group-text">Mobile  </span>
    </div>
    <input type="text" class="form-control" value="<?php echo set_value('mobile') ?>" id="exampleInputEmail1" name="mobile" aria-describedby="emailHelp" placeholder="Mobile">
    <p class="help-block"><?php  echo form_error('mobile', '<small class="text-red">', '</small>'); ?></p>
  </div>

  <div class="input-group mb-3">
   <div class="input-group-prepend">
    <span class="input-group-text">Email   </span>
  </div>
  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>" name="email" aria-describedby="emailHelp" placeholder="Email">
  <p class="help-block"><?php  echo form_error('Email', '<small class="text-red">', '</small>'); ?></p>
</div>

<div class="input-group mb-3">
 <div class="input-group-prepend">
  <span class="input-group-text">Password</span>
</div>
<input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" placeholder="Password">
<p class="help-block"><?php  echo form_error('password', '<small class="text-red">', '</small>'); ?></p>
</div>

</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Register</button>
</div>
</form>
</div>
</div>
</div>
<!-- End Modal Register -->




<!-- Modal Lupa Password -->
<div class="modal fade" id="modal_lupas" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title" id="myModalLabel">Register</h3>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
   </div>
   <form class="form-horizontal" action="<?php echo base_url().'user/email_reset_password_validation'; ?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">
      <div class="input-group mb-3">
       <div class="input-group-prepend">
        <span class="input-group-text">Email   </span>
      </div>
      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>" name="email" aria-describedby="emailHelp" placeholder="Email">
      <p class="help-block"><?php  echo form_error('Email', '<small class="text-red">', '</small>'); ?></p>
    </div>

    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
      <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Reset Password</button>
    </div>
</form>
</div>
</div>
</div>
<!-- End Modal Lupa Password -->



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
      <a class="nav-link" href="<?php echo base_url() ?>"><i class="fas fa-home"></i> Home</a>
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

 <section   id="trial" style="padding-top:0px; ">
  <div class="" >
   <div class="row">
    <div class="col-md-3">
     <form action="" method="get" style="margin:10px;">
      <div class="control-group form-group">
       <div class="controls">
        <label>Kata Kunci :</label>
        <input type="text" name="q" value="<?php echo $this->input->get('q') ?>" class="form-control" id="place-input">
      </div>
    </div>

    <?php if($this->db->get('categories')->num_rows()) : ?>
    <div class="control-group form-group">
     <div class="controls">
      <label>Kategori :</label><br>
      <?php foreach($this->db->get('categories')->result() as $key => $row) : ?>
      <div class="checkbox checkbox-info">
        <input type="checkbox" value="<?php echo $row->name; ?>" name="categories[<?php echo $key ?>]" <?php if((int)@in_array($row->category_id, $this->input->get('categories')) AND @is_array($this->input->get('categories'))) echo 'checked'; ?>
        <label> <?php echo $row->name; ?></label>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>






<div class="control-group form-group">
  <div class="controls">
    <label>Tarif :</label>
    <select name="price" id="input" class="form-control">
     <option value="">~ SEMUA ~</option>
     <option value="<25000000" <?php if($this->input->get('price') == '<25000000') echo 'selected'; ?>> < Rp.25.000.000</option>
     <option value="25000000-50000000" <?php if($this->input->get('price') == '25000000-50000000') echo 'selected'; ?>>Rp.25.000.000 s/d Rp.50.000.000</option>
     <option value="50000000-100000000" <?php if($this->input->get('price') == '50000000-100000000') echo 'selected'; ?>>Rp.50.000.000 s/d Rp.100.000.000</option>
     <option value="100000000" <?php if($this->input->get('price') == '100000000') echo 'selected'; ?>> > Rp.100.000.000</option>
   </select>
 </div>
</div>
<div id="success"></div>
<!-- For success/fail messages -->
<button type="submit" class="btn btn-primary btn-lg btn-block">Cari Lokasi</button>
</form>
</div>
<div class="col-md-9">
 <div class="map-view"><?php echo $map['html'] ?></div>
</div>
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
  <p>Billboard termasuk salah satu model iklan di luar ruang atau outdoor advertising yang paling banyak dipakai untuk promosi suatu produk misalnya smartphone terbaru, atau bisa juga berisikan pengumuman dari pemerintah. Pada perkembangannya billboard semakin maju dengan adanya teknologi sehingga muncul digital billboard. Ada pula mobile billboard yaitu billboard yang berjalan karena dipasang di mobil atau disebut iklan berjalan. Dan sekarang juga sudah ada digital mobile billboard yang merupakan perpaduan antara digital billboard dan mobile billboard, sehingga billboard jenis ini mempunyai gambar yang bisa bergerak (versi digital) dan dapat berjalan.
   <table class="table table-striped">
    <tbody>
     <tr>
      <td>Nama Pengembang</td>
      <td width="50" class="text-center">:</td>
      <td>Mochamad Nurjaman</td>
    </tr>
    <tr>
      <td>Email</td>
      <td width="50" class="text-center">:</td>
      <td>nurzaman02@gmail.com</td>
    </tr>

    <tr>
      <td>Alamat</td>
      <td width="50" class="text-center">:</td>
      <td>Jl. Cihanjuang , Gg.Ledeng 1 no 137, Rt 03/09 , Kecamatan Cimahi Utara</td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td width="50" class="text-center">:</td>
      <td><a href="https://api.whatsapp.com/send?phone=6289672255644&text=Halo, Nurjaman, saya mau tanya-tanya mengenai SIB nya">0896-7225-5644</a></td>
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