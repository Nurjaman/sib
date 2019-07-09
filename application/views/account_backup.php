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
      </div>
      <h1>Atas Nama :  "<?php  echo $user[0]->fullname ?>"</h1>

    </div>

    <div class="section-body">

      <form   action="<?php echo base_url() ?>admin/proses_tambah_gambar" method="POST" enctype="multipart/form-data" novalidate>


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
                    <input type="text"  name="username" class="form-control" value="<?php echo $user[0]->username ?>" placeholder="Isi dengan username anda ">
                    <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>


                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                  <div class="col-sm-12 col-md-7">
                   <input type="text" name="fullname" class="form-control" value="<?php echo $user[0]->fullname ?>" placeholder="">
                   <p class="help-block"><?php  echo form_error('fullname', '<small class="text-red">', '</small>'); ?></p>
                 </div>
               </div>

               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                 <input type="text" name="email" class="form-control" value="<?php echo $user[0]->email ?>" placeholder="">
                 <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
               </div>
             </div>

             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile</label>
              <div class="col-sm-12 col-md-7">
               <input type="text" name="mobile" class="form-control" value="<?php echo $user[0]->mobile ?>" placeholder="">
               <p class="help-block"><?php  echo form_error('mobile', '<small class="text-red">', '</small>'); ?></p>
             </div>
           </div>


           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
            <div class="col-sm-12 col-md-7">
             <input type="text" name="kota" class="form-control" value="<?php echo $user[0]->kota ?>" placeholder="">
             <p class="help-block"><?php  echo form_error('kota', '<small class="text-red">', '</small>'); ?></p>
           </div>
         </div>

         <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode POS</label>
          <div class="col-sm-12 col-md-7">
           <input type="text" name="kode_pos" class="form-control" value="<?php echo $user[0]->kode_pos ?>" placeholder="">
           <p class="help-block"><?php  echo form_error('kode_pos', '<small class="text-red">', '</small>'); ?></p>
         </div>
       </div>

       <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
        <div class="col-sm-12 col-md-7">
         <textarea rows="10"  name="alamat" class="form-control"> <?php echo $user[0]->alamat ?> </textarea>
         <p class="help-block"><?php  echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
       </div>
     </div>

     <?php if(sizeOf($perusahaan) == 0) :?>
      <!-- 0 itu sama dengan membuat / Create -->
      <input type="text" name="aksi" value="Create">
      <div class="card-header">
        <h4>Data Perusahaan
          <small class="form-text text-muted">Isi data perusahaan bila Anda mewakili sebuah perusahaan atau isi dengan nama Anda bila tidak mewakili perusahaan</small></h4>
        </div>
        <br>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perusahaan</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="nm_perusahaan" class="form-control" value="<?php //echo $user[0]->nm_perusahaan ?>" placeholder="Perusahaan tempat anda bekerja">
            <p class="help-block"><?php  echo form_error('nm_perusahaan', '<small class="text-red">', '</small>'); ?></p>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan Anda</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="jabatan_perusahaan" class="form-control" value="<?php //echo $user[0]->nm_perusahaan ?>" placeholder="Jabatan anda di Kantor">
            <p class="help-block"><?php  echo form_error('jabatan_perusahaan', '<small class="text-red">', '</small>'); ?></p>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Direktur</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="direktur_perusahaan" class="form-control" value="<?php //echo $user[0]->nm_perusahaan ?>" placeholder="Nama Drektur di tmpt anda bekerja">
            <p class="help-block"><?php  echo form_error('direktur_perusahaan', '<small class="text-red">', '</small>'); ?></p>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kontak</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="kontak_perusahaan" class="form-control" value="<?php //echo $user[0]->mobile_perusahaan ?>" placeholder="Nama yang akan di catat, di kontrak">
            <p class="help-block"><?php  echo form_error('kontak_perusahaan', '<small class="text-red">', '</small>'); ?></p>
          </div>
        </div>


        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telepon Kantor</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="mobile_perusahaan" class="form-control" value="<?php //echo $user[0]->mobile_perusahaan ?>" placeholder="Nomor Kantor. Ex : 022-1234567">
            <p class="help-block"><?php  echo form_error('mobile_perusahaan', '<small class="text-red">', '</small>'); ?></p>
          </div>
        </div>


        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fax Kantor</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="mobile_perusahaan" class="form-control" value="<?php //echo $user[0]->fax_perusahaan ?>" placeholder="Fax Kantor. Ex : (556)-1234567">
            <p class="help-block"><?php  echo form_error('mobile_perusahaan', '<small class="text-red">', '</small>'); ?></p>
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
          <div class="col-sm-12 col-md-7">
           <textarea rows="10"  name="alamat_perusahaan" class="form-control"> <?php //echo $user[0]->alamat_perusahaan ?> </textarea>
           <p class="help-block"><?php  echo form_error('alamat_perusahaan', '<small class="text-red">', '</small>'); ?></p>
         </div>
       </div>
       <?php else : ?>
        <input type="text" name="aksi" value="Update">
        <div class="card-header">
          <h4>Data Perusahaan
            <small class="form-text text-muted">Isi data perusahaan bila Anda mewakili sebuah perusahaan atau isi dengan nama Anda bila tidak mewakili perusahaan</small></h4>
          </div>
          <br>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perusahaan</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="nm_perusahaan" class="form-control" value="<?php //echo $user[0]->nm_perusahaan ?>" placeholder="Perusahaan tempat anda bekerja">
              <p class="help-block"><?php  echo form_error('nm_perusahaan', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan Anda</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="jabatan_perusahaan" class="form-control" value="<?php //echo $user[0]->nm_perusahaan ?>" placeholder="Jabatan anda di Kantor">
              <p class="help-block"><?php  echo form_error('jabatan_perusahaan', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Direktur</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="direktur_perusahaan" class="form-control" value="<?php //echo $user[0]->nm_perusahaan ?>" placeholder="Nama Drektur di tmpt anda bekerja">
              <p class="help-block"><?php  echo form_error('direktur_perusahaan', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kontak</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="kontak_perusahaan" class="form-control" value="<?php //echo $user[0]->mobile_perusahaan ?>" placeholder="Nama yang akan di catat, di kontrak">
              <p class="help-block"><?php  echo form_error('kontak_perusahaan', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>


          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telepon Kantor</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="mobile_perusahaan" class="form-control" value="<?php //echo $user[0]->mobile_perusahaan ?>" placeholder="Nomor Kantor. Ex : 022-1234567">
              <p class="help-block"><?php  echo form_error('mobile_perusahaan', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>


          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fax Kantor</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="mobile_perusahaan" class="form-control" value="<?php //echo $user[0]->fax_perusahaan ?>" placeholder="Fax Kantor. Ex : (556)-1234567">
              <p class="help-block"><?php  echo form_error('mobile_perusahaan', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
             <textarea rows="10"  name="alamat_perusahaan" class="form-control"> <?php //echo $user[0]->alamat_perusahaan ?> </textarea>
             <p class="help-block"><?php  echo form_error('alamat_perusahaan', '<small class="text-red">', '</small>'); ?></p>
           </div>
         </div>
       <?php endif; ?>

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

       <?php if($user[0]->photo_profile != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_user/{$user[0]->photo_profile}") ?>" data-lightbox="example-set" data-title="Foto Profile"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_user/{$user[0]->photo_profile}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
           <input type="file" name="photo_profile">
         <?php endif; ?>
       </div>
     </div>

     <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto NPWP</label>
      <div class="col-md-4">
       <?php if($user[0]->photo_npwp != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_npwp/{$user[0]->photo_npwp}") ?>" data-lightbox="example-set" data-title="Foto NPWP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_npwp/{$user[0]->photo_npwp}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
          <input type="file" name="photo_npwp">
        <?php endif; ?>
      </div>
    </div>

    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SPPKP</label>
      <div class="col-md-4">
       <?php if($user[0]->photo_sppkp != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_sppkp/{$user[0]->photo_sppkp}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_sppkp/{$user[0]->photo_spkp}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
          <input type="file" name="photo_sppkp">
        <?php endif; ?>
      </div>
    </div>

    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SIUP</label>
      <div class="col-md-4">
       <?php if($user[0]->photo_siup != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/foto_siup/{$user[0]->photo_siup}") ?>" data-lightbox="example-set" data-title="Foto SIUP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_siup/{$user[0]->photo_siup}") ?>" height="150" width="250" /> </a>
         <?php else : ?>
           <input type="file" name="photo_siup">
         <?php endif; ?>
       </div>
     </div>

     <hr>
<!-- <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
  <div class="col-sm-12 col-md-7">
    <?php //if($reklame[0]->status_order == "0") : ?>
     <button type="submit" class="btn btn-info btn-block" onclick="acceptOrder('<?php //echo $reklame[0]->no_invoice ?>')"  style="color: green" class="fas fa-check" value="Accept">
      <i class="fas fa-check">Accept</i></a>
      <?php //else : ?>
        <button type="submit" class="btn btn-danger btn-block" onclick="declineOrder('<?php //echo $reklame[0]->no_invoice ?>')" style="color: red" value="Decline">
         <i class="fas fa-exclamation">Decline</i></a> 
       <?php //endif; ?>
     </div>
   </div>
 -->
</div>
</div>
</div>
</section>
</div>

<?php
$this->load->view('include/footer', $this->data);