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


  <?php $id = $this->session->userdata('userId');
  $this->db->select('*')
  ->FROM('users')
  ->where('userId',$id);
  $query = $this->db->get()->result();
  foreach ($query as $q) : ?>








    <!-- =========== M O D A L | U P L O A D ============ -->

    <!-- UPLOAD PROFILE -->
    <div class="modal fade" id="upload_profile" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h3 class="modal-title" id="myModalLabel">Upload Foto Profile</h3>
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
       </div>
       <form class="form-horizontal" action="<?php echo base_url('user/UpadateFotoUser/'.$q->userId  ) ?>" method="post" enctype="multipart/form-data">
         <div class="modal-body">

          <div class="form-group">
           <div class="row">

            <div class="form-group row mb-4">
              <div class="col-md-4">
                <?php if($q->photo_profile != '') : ?>
                 <a class="example-image-link" href="<?php echo base_url("public/image/foto_user/{$q->photo_profile}") ?>" data-lightbox="example-set" data-title="Foto User"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_user/{$q->photo_profile}") ?>" height="250" width="450" /> </a>
                 <hr>
                 <input type="file" name="photo_profile">

                 <?php else : ?>
                  <input type="file" name="photo_profile">

                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Upload</button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- End Upload Profile -->



<!-- UPLOAD NPWP -->
<div class="modal fade" id="upload_npwp" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title" id="myModalLabel">Upload Foto Npwp</h3>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
   </div>
   <form class="form-horizontal" action="<?php echo base_url('user/UpadateFotoNpwp/'.$q->userId  ) ?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">

      <div class="form-group">
       <div class="row">

        <div class="form-group row mb-4">
          <div class="col-md-4">
            <?php if($q->photo_npwp != '') : ?>
             <a class="example-image-link" href="<?php echo base_url("public/image/foto_npwp/{$q->photo_npwp}") ?>" data-lightbox="example-set" data-title="Foto npwpr"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_user/{$q->photo_npwp}") ?>" height="250" width="450" /> </a>
             <hr>
             <input type="file" name="photo_npwp">

             <?php else : ?>
              <input type="file" name="photo_npwp">

            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Upload</button>
  </div>
</form>
</div>
</div>
</div>
<!-- End Upload NPWP -->


<!-- UPLOAD SPPKP -->
<div class="modal fade" id="upload_sppkp" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title" id="myModalLabel">Upload Foto SPPKP</h3>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
   </div>
   <form class="form-horizontal" action="<?php echo base_url('user/UpadateFotoSppkp/'.$q->userId  ) ?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">

      <div class="form-group">
       <div class="row">

        <div class="form-group row mb-4">
          <div class="col-md-4">
            <?php if($q->photo_sppkp != '') : ?>
             <a class="example-image-link" href="<?php echo base_url("public/image/foto_sppkp/{$q->photo_sppkp}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_sppkp/{$q->photo_sppkp}") ?>" height="250" width="450" /> </a>
             <hr>
             <input type="file" name="photo_sppkp">

             <?php else : ?>
              <input type="file" name="photo_sppkp">

            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Upload</button>
  </div>
</form>
</div>
</div>
</div>
<!-- End Upload SPPKP -->



<!-- UPLOAD SPPKP -->
<div class="modal fade" id="upload_siup" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title" id="myModalLabel">Upload Foto SIUP</h3>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
   </div>
   <form class="form-horizontal" action="<?php echo base_url('user/UpadateFotoSiup/'.$q->userId  ) ?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">

      <div class="form-group">
       <div class="row">

        <div class="form-group row mb-4">
          <div class="col-md-4">
            <?php if($q->photo_siup != '') : ?>
             <a class="example-image-link" href="<?php echo base_url("public/image/foto_siup/{$q->photo_siup}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_siup/{$q->photo_siup}") ?>" height="250" width="450" /> </a>
             <hr>
             <input type="file" name="photo_siup">

             <?php else : ?>
              <input type="file" name="photo_siup">

            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Upload</button>
  </div>
</form>
</div>
</div>
</div>
<!-- End Upload SPPKP -->


<!-- ========================== -->
<!-- CHANGE PASSWORD -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title" id="myModalLabel">Change Password</h3>
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
   </div>
   <form class="form-horizontal" action="<?php echo base_url('user/UpadateFotoSiup/'.$q->userId  ) ?>" method="post" enctype="multipart/form-data">
     <div class="modal-body">

      <div class="form-group">
       <div class="row">

        <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text">Password Old</span>
        </div>
        <input type="password" class="form-control" name="password_old" value="<?php echo set_value('password') ?>" placeholder="Password Lama">
        <p class="help-block"><?php  echo form_error('password', '<small class="text-red">', '</small>'); ?></p>
      </div>

      <hr>

      <div class="input-group mb-3">
       <div class="input-group-prepend">
        <span class="input-group-text">Password New</span>
      </div>
      <input type="password" class="form-control" name="password_new" value="<?php echo set_value('password') ?>" placeholder="Password Baru">
      <p class="help-block"><?php  echo form_error('password', '<small class="text-red">', '</small>'); ?></p>
    </div>

    <div class="input-group mb-3">
     <div class="input-group-prepend">
      <span class="input-group-text">Re-Password</span>
    </div>
    <input type="password" class="form-control" name="retype_password_new" value="<?php echo set_value('retype_password') ?>" placeholder="Retype Password Baru">
    <p class="help-block"><?php  echo form_error('password', '<small class="text-red">', '</small>'); ?></p>
  </div>
</div>
</div>

</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Change Password</button>
</div>
</form>
</div>
</div>
</div>
<!-- End Change Password -->






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
        <h1>Atas Nama :  "<?php  echo $q->fullname ?>"</h1>

      </div>
      <div class="section-body">
        <!-- <form class="form-horizontal" action="<?php //echo current_url(); ?>" method="post" enctype="multipart/form-data"> -->
          <form action="<?php echo base_url('user/updateuser1/'.$q->userId  ) ?>" enctype="multipart/form-data" method="post">


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
                        <input type="text"  name="username" class="form-control" value="<?php echo $q->username ?>" placeholder="Isi dengan username anda" >
                        <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password :</label>
                      <div class="col-sm-12 col-md-7">
                       <a class="menu-btn" data-toggle="modal" data-target="#change_password" href="#"><i class="fa fa-user-circle"></i>Change Password .. </a>
                     </div>
                   </div>


                   <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                    <div class="col-sm-12 col-md-7">
                     <input type="text" name="fullname" class="form-control" value="<?php echo $q->fullname ?>" placeholder="">
                     <p class="help-block"><?php  echo form_error('fullname', '<small class="text-red">', '</small>'); ?></p>
                   </div>
                 </div>

                 <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                  <div class="col-sm-12 col-md-7">
                   <input type="text" name="email" class="form-control" value="<?php echo $q->email ?>" placeholder="">
                   <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
                 </div>
               </div>

               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile</label>
                <div class="col-sm-12 col-md-7">
                 <input type="text" name="mobile" class="form-control" value="<?php echo $q->mobile ?>" placeholder="">
                 <p class="help-block"><?php  echo form_error('mobile', '<small class="text-red">', '</small>'); ?></p>
               </div>
             </div>


             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
              <div class="col-sm-12 col-md-7">
               <input type="text" name="kota" class="form-control" value="<?php echo $q->kota ?>" placeholder="">
               <p class="help-block"><?php  echo form_error('kota', '<small class="text-red">', '</small>'); ?></p>
             </div>
           </div>

           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode POS</label>
            <div class="col-sm-12 col-md-7">
             <input type="text" name="kode_pos" class="form-control" value="<?php echo $q->kode_pos ?>" placeholder="">
             <p class="help-block"><?php  echo form_error('kode_pos', '<small class="text-red">', '</small>'); ?></p>
           </div>
         </div>

         <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
          <div class="col-sm-12 col-md-7">
           <textarea rows="10"  name="alamat" class="form-control"> <?php echo $q->alamat ?> </textarea>
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

       <?php if($q->photo_profile != '') : ?>
        <a class="menu-btn" data-toggle="modal" data-target="#upload_profile" href="#"><i class="fa fa-user-circle"></i>Update Profile .. </a>
        <hr>
        <a class="example-image-link" href="<?php echo base_url("public/image/foto_user/{$q->photo_profile}") ?>" data-lightbox="example-set" data-title="Foto Profile"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_user/{$q->photo_profile}") ?>" height="150" width="250" /> </a>
        <?php else : ?>
         <a class="menu-btn" data-toggle="modal" data-target="#upload_profile" href="#"><i class="fa fa-user-circle"></i>Upload Foto Profile .. </a>

       <?php endif; ?>
     </div>
   </div>

   <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto NPWP</label>
    <div class="col-md-4">
     <?php if($q->photo_npwp != '') : ?>
      <a class="menu-btn" data-toggle="modal" data-target="#upload_npwp" href="#"><i class="fa fa-user-circle"></i>Update NPWP .. </a>
      <hr>
      <a class="example-image-link" href="<?php echo base_url("public/image/foto_npwp/{$q->photo_npwp}") ?>" data-lightbox="example-set" data-title="Foto NPWP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_npwp/{$q->photo_npwp}") ?>" height="150" width="250" /> </a>
      <?php else : ?>
       <a class="menu-btn" data-toggle="modal" data-target="#upload_npwp" href="#"><i class="fa fa-user-circle"></i>Upload Foto NPWP .. </a>
     <?php endif; ?>
   </div>
 </div>

 <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SPPKP</label>
  <div class="col-md-4">
    <?php if($q->photo_sppkp != '') : ?>
     <a class="menu-btn" data-toggle="modal" data-target="#upload_sppkp" href="#"><i class="fa fa-user-circle"></i>Update SPPKP .. </a>
     <hr>
     <a class="example-image-link" href="<?php echo base_url("public/image/foto_sppkp/{$q->photo_sppkp}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_sppkp/{$q->photo_sppkp}") ?>" height="150" width="250" /> </a>
     <?php else : ?>
       <a class="menu-btn" data-toggle="modal" data-target="#upload_sppkp" href="#"><i class="fa fa-user-circle"></i>Upload Foto SPPKP .. </a>
     <?php endif; ?>
   </div>
 </div>

 <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SIUP</label>
  <div class="col-md-4">
   <?php if($q->photo_siup != '') : ?>
    <a class="menu-btn" data-toggle="modal" data-target="#upload_siup" href="#"><i class="fa fa-user-circle"></i>Update SPPKP .. </a>
    <hr>
    <a class="example-image-link" href="<?php echo base_url("public/image/foto_siup/{$q->photo_siup}") ?>" data-lightbox="example-set" data-title="Foto SIUP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_siup/{$q->photo_siup}") ?>" height="150" width="250" /> </a>
    <?php else : ?>
      <a class="menu-btn" data-toggle="modal" data-target="#upload_siup" href="#"><i class="fa fa-user-circle"></i>Upload Foto SIUP .. </a>
    <?php endif; ?>
  </div>
</div>

<hr>
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
  <div class="col-sm-12 col-md-7">

        <!-- <button type="submit" class="btn btn-info btn-block" onclick="updateProfile('<?php //echo $q->userId ?>')"  style="color: green" class="fas fa-check" value="Update">
          <i class="fas fa-check">Update</i></a> -->

          <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
</section>

</div>





<?php
$this->load->view('include/footer', $this->data);