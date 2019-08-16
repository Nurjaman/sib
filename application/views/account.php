<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($this->session->userdata("role")=="Admin") : ?>
  <?php $this->load->view('include/header', $this->data); ?>
  <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
   <?php $this->load->view('include/header_seller', $this->data); ?>
   <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
    <?php $this->load->view('include/header_buyer', $this->data); ?>
  <?php endif; ?>

<body id="page-top">
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <?php if ($this->session->userdata("role")=="Admin") : ?>
           <a href="<?php echo base_url() ?>Admin" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
           <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
            <a href="<?php echo base_url() ?>Seller" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
              <a href="<?php echo base_url() ?>Buyer" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            <?php endif; ?>

          </div>

          <h1>Role : <?php  echo $user->role ?> </h1>

        </div>
        <div class="section-body">
          <!-- <form class="form-horizontal" action="<?php //echo current_url(); ?>" method="post" enctype="multipart/form-data"> -->
            <form action="<?php echo base_url('admin/updateuser/'.$user->userId  ) ?>" enctype="multipart/form-data" method="post">


              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                     <div class="card-header">
                      <h4>Data Diri  
                        <small class="form-text text-muted">Data detail Users penyewa</small></h4>
                      </div>
                      <br>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username :</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text"  name="username" class="form-control" value="<?php echo $user->username ?>" placeholder="Isi dengan username anda" >
                          <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                        </div>
                      </div>
<!-- 
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role :</label>
                        <div class="col-sm-12 col-md-7">
                          <select name="role"  id="input" class="form-control">
                            <option value="<?php  //echo $user->role ?>"><?php  echo $user->role ?></option>
                            <option value="">---PILIH---</option>
                            <option value="Admin">Admin</option>
                            <option value="Penyewa">Penyewa</option>
                            <option value="Pemilik Media">Pemilik Media</option>
                          </select>
                        </div>
                      </div> -->

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                      <div class="col-sm-12 col-md-7">
                       <input type="text" name="fullname" class="form-control" value="<?php echo $user->fullname ?>" placeholder="">
                       <p class="help-block"><?php  echo form_error('fullname', '<small class="text-red">', '</small>'); ?></p>
                     </div>
                   </div>

                   <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                    <div class="col-sm-12 col-md-7">
                     <input type="text" name="email" class="form-control" value="<?php echo $user->email ?>" placeholder="">
                     <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
                   </div>
                 </div>

                 <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile</label>
                  <div class="col-sm-12 col-md-7">
                   <input type="text" name="mobile" class="form-control" value="<?php echo $user->mobile ?>" placeholder="">
                   <p class="help-block"><?php  echo form_error('mobile', '<small class="text-red">', '</small>'); ?></p>
                 </div>
               </div>


               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                <div class="col-sm-12 col-md-7">
                 <input type="text" name="kota" class="form-control" value="<?php echo $user->kota ?>" placeholder="">
                 <p class="help-block"><?php  echo form_error('kota', '<small class="text-red">', '</small>'); ?></p>
               </div>
             </div>

             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode POS</label>
              <div class="col-sm-12 col-md-7">
               <input type="text" name="kode_pos" class="form-control" value="<?php echo $user->kode_pos ?>" placeholder="">
               <p class="help-block"><?php  echo form_error('kode_pos', '<small class="text-red">', '</small>'); ?></p>
             </div>
           </div>

           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
             <textarea rows="10"  name="alamat" class="form-control"> <?php echo $user->alamat ?> </textarea>
             <p class="help-block"><?php  echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
           </div>
         </div>

       </form>
     </div>
   </div>
 </div>




 <div class="col-md-6">
  <div class="card">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
    <div class="card-header">
      <h4>Data Foto
        <small class="form-text text-muted">Data Foto</small>
      </h4>
    </div>
    <br>

    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto profile</label>
      <div class="col-md-4">

       <?php if($user->photo_profile != '') : ?>
        <a class="example-image-link" href="<?php echo base_url("public/image/foto_user/{$user->photo_profile}") ?>" data-lightbox="example-set" data-title="Foto Profile"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_user/{$user->photo_profile}") ?>" height="150" width="250" /> </a>
        <?php else : ?>
        <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
       <?php endif; ?>
     </div>
   </div>

   <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto NPWP</label>
    <div class="col-md-4">
     <?php if($user->photo_npwp != '') : ?>

      <a class="example-image-link" href="<?php echo base_url("public/image/foto_npwp/{$user->photo_npwp}") ?>" data-lightbox="example-set" data-title="Foto NPWP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_npwp/{$user->photo_npwp}") ?>" height="150" width="250" /> </a>
      <?php else : ?>
        <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
     <?php endif; ?>
   </div>
 </div>

 <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SPPKP</label>
  <div class="col-md-4">
    <?php if($user->photo_sppkp != '') : ?>

     <a class="example-image-link" href="<?php echo base_url("public/image/foto_sppkp/{$user->photo_sppkp}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_sppkp/{$user->photo_sppkp}") ?>" height="150" width="250" /> </a>
     <?php else : ?> 
    <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
    <?php endif; ?>
  </div>
</div>

<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SIUP</label>
  <div class="col-md-4">
   <?php if($user->photo_siup != '') : ?>

    <a class="example-image-link" href="<?php echo base_url("public/image/foto_siup/{$user->photo_siup}") ?>" data-lightbox="example-set" data-title="Foto SIUP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_siup/{$user->photo_siup}") ?>" height="150" width="250" /> </a>
    <?php else : ?>
     <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
   <?php endif; ?>
 </div>
</div>

<!-- <hr> -->
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
  <div class="col-sm-12 col-md-7">

        <!-- <button type="submit" class="btn btn-info btn-block" onclick="updateProfile('<?php //echo $user->userId ?>')"  style="color: green" class="fas fa-check" value="Update">
          <i class="fas fa-check">Update</i></a> -->

          <!-- <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update</button> -->
        </div>
      </div>

    </div>
  </div>
</div>
</section>

</div>





<?php
$this->load->view('include/footer', $this->data);