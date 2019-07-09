<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?php echo base_url() ?>admin/portfolio" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        <?php $id = $this->session->userdata('userId');
        $this->db->select('*')
        ->FROM('users')
        ->where('userId',$id);
        $query = $this->db->get()->result();
        foreach ($query as $q) : ?>
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
                        <input type="text"  name="username" class="form-control" value="<?php echo $q->username ?>" placeholder="Isi dengan username anda ">
                        <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
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
         <a class="example-image-link" href="<?php echo base_url("public/image/data_profile/{$q->photo_profile}") ?>" data-lightbox="example-set" data-title="Foto Profile"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/data_profile/{$q->photo_profile}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
           <input type="file" name="photo_profile">

         <?php endif; ?>
       </div>
     </div>

     <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto NPWP</label>
      <div class="col-md-4">
       <?php if($q->photo_npwp != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_npwp/{$q->photo_npwp}") ?>" data-lightbox="example-set" data-title="Foto NPWP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_npwp/{$q->photo_npwp}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
          <input type="file" name="photo_npwp">
        <?php endif; ?>
      </div>
    </div>

    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SPPKP</label>
      <div class="col-md-4">
        <?php if($q->photo_sppkp != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_sppkp/{$q->photo_sppkp}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_sppkp/{$q->photo_sppkp}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
          <input type="file" name="photo_sppkp">
        <?php endif; ?>
      </div>
    </div>

    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SIUP</label>
      <div class="col-md-4">
       <?php if($q->photo_siup != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_siup/{$q->photo_siup}") ?>" data-lightbox="example-set" data-title="Foto SIUP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_siup/{$q->photo_siup}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
           <input type="file" name="photo_siup">
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