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
      <?php foreach ($reklame as $p) {
              # code...
      }?>
      <h1>Nomor "<?php echo $reklame[0]->no_invoice ?>"</h1>

    </div>

    <div class="section-body">

     <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">


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
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                  <div class="col-sm-12 col-md-7">
                   <input type="text" name="username" class="form-control" value="<?php echo $reklame[0]->username ?>" placeholder="">
                   <p class="help-block"><?php  echo form_error('username', '<small class="text-red">', '</small>'); ?></p>
                 </div>
               </div>


               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                <div class="col-sm-12 col-md-7">
                 <input type="text" name="fullname" class="form-control" value="<?php echo $reklame[0]->fullname ?>" placeholder="">
                 <p class="help-block"><?php  echo form_error('fullname', '<small class="text-red">', '</small>'); ?></p>
               </div>
             </div>

             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
              <div class="col-sm-12 col-md-7">
               <input type="text" name="email" class="form-control" value="<?php echo $reklame[0]->email ?>" placeholder="">
               <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
             </div>
           </div>

           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile</label>
            <div class="col-sm-12 col-md-7">
             <input type="text" name="mobile" class="form-control" value="<?php echo $reklame[0]->mobile ?>" placeholder="">
             <p class="help-block"><?php  echo form_error('mobile', '<small class="text-red">', '</small>'); ?></p>
           </div>
         </div>



         <div class="card-header">
          <h4>Data Reklame
            <small class="form-text text-muted">Data detail Reklame yang akan di pesan oleh penyewa</small></h4>
          </div>
          <br>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Reklame</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="email" class="form-control" value="<?php echo $reklame[0]->name ?>" placeholder="">
              <p class="help-block"><?php  echo form_error('Kota', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga reklame</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="email" class="form-control" value="<?php echo number_format($reklame[0]->price) ?>" placeholder="">
              <p class="help-block"><?php  echo form_error('kode_pos', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
             <textarea rows="10"  name="address" class="form-control"> <?php echo $reklame[0]->address ?> </textarea>
             <p class="help-block"><?php  echo form_error('address', '<small class="text-red">', '</small>'); ?></p>
           </div>
         </div>


         <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinate</label>
          <div class="col-sm-12 col-md-7">
           <small class="form-text text-muted">Latitude</small>
           <input type="text" name="latitude" class="form-control" value="<?php echo $reklame[0]->latitude ?>" placeholder="">
           <small class="form-text text-muted">Longitude</small>
           <input type="text" name="longitude" class="form-control" value="<?php echo $reklame[0]->longitude ?>" placeholder="">
         </div>
       </div>

       <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Media</label>
        <div class="col-sm-12 col-md-7">
         <input type="text" name="jenis_media" class="form-control" value="<?php echo $reklame[0]->jenis_media ?>" placeholder="">
         <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
       </div>
     </div>

     <!-- Foto Reklame -->
     <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto :</label>
      <div class="col-md-4">
        <?php if($reklame[0]->photo != '') : ?>
         <a class="example-image-link" href="<?php echo base_url("public/image/{$reklame[0]->photo}") ?>" data-lightbox="example-set" data-title="Foto Reklame yang akan dipesan"><img alt="Bootstrap template" src="<?php echo base_url("public/image/{$reklame[0]->photo}") ?>"  height="150" width="250"/> </a>

       <?php endif; ?>
     </div>
   </div>

   <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran</label>
    <div class="col-sm-12 col-md-7">
     <input type="text" name="Ukuran" class="form-control" value="<?php echo $reklame[0]->ukuran ?>" placeholder="">
     <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
   </div>
 </div>

 <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Web Pemilik Media</label>
  <div class="col-sm-12 col-md-7">
    <a href="<?php echo $reklame[0]->link  ?>" target="_blank"> 
     <input type="text" name="link" class="form-control" value="<?php echo $reklame[0]->link  ?>">
   </a>
   <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
 </div>
</div>
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Reklame</label>
  <div class="col-sm-12 col-md-7">
   <input type="text" name="status" class="form-control" value="<?php echo $reklame[0]->status ?>" placeholder="">
   <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
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
      <h4>Data Order
        <small class="form-text text-muted">Data detail Order yang  di pesan oleh penyewa</small>
      </h4>
    </div>
    <br>



    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Order</label>
      <div class="col-sm-12 col-md-7">
       <input type="text" name="Ukuran" class="form-control" value="<?php echo $reklame[0]->tanggal ?>" placeholder="">
       <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
     </div>
   </div>

   <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto iklan</label>
    <div class="col-md-4">
     <?php if($reklame[0]->photo_order != '') : ?>
       <a class="example-image-link" href="<?php echo base_url("public/image/path_order/{$reklame[0]->photo_order}") ?>" data-lightbox="example-set" data-title="Gambar iklan yang akan di pasang"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/path_order/{$reklame[0]->photo_order}") ?>" height="150" width="250" /> </a>
     <?php endif; ?>
   </div>
 </div>


 <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description Order</label>
  <div class="col-sm-12 col-md-7">
    <textarea rows="10"  name="description" class="form-control"> <?php echo $reklame[0]->description ?> </textarea>
    <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
  </div>
</div>


<div class="card-header">
  <h4>Data Photo
    <small class="form-text text-muted">*Data detail Foto yang penting di lengkapi</small>
  </h4>
</div>
<br>

<!-- Foto Reklame -->
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto NPWP :</label>
  <div class="col-md-4">
    <?php if($reklame[0]->photo_npwp != '') : ?>
      <a class="example-image-link" href="<?php echo base_url("public/image/foto_npwp/{$reklame[0]->photo_npwp}") ?>" data-lightbox="example-set" data-title="Foto NPWP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_npwp/{$reklame[0]->photo_npwp}") ?>" height="150" width="250" /> </a>
     <?php else : ?>
     <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
    <?php endif; ?>
  </div>
</div>

<!-- Foto Reklame -->
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SPPKP :</label>
  <div class="col-md-4">
     <?php if($reklame[0]->photo_sppkp != '') : ?>
      <a class="example-image-link" href="<?php echo base_url("public/image/foto_sppkp/{$reklame[0]->photo_sppkp}") ?>" data-lightbox="example-set" data-title="Foto SPPKP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_sppkp/{$reklame[0]->photo_sppkp}") ?>" height="150" width="250" /> </a>
     <?php else : ?>
     <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
    <?php endif; ?>
  </div>
</div>


<!-- Foto Reklame -->
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto SIUP :</label>
  <div class="col-md-4">
      <?php if($reklame[0]->photo_siup != '') : ?>
      <a class="example-image-link" href="<?php echo base_url("public/image/foto_siup/{$reklame[0]->photo_siup}") ?>" data-lightbox="example-set" data-title="Foto SIUP"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_siup/{$reklame[0]->photo_siup}") ?>" height="150" width="250" /> </a>
     <?php else : ?>
     <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="150" width="250" /> </a>
    <?php endif; ?>
  </div>
</div>
<hr>
<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
  <div class="col-sm-12 col-md-7">
    <?php if($reklame[0]->status_order == "0") : ?>
    <a type="submit" class="btn btn-info btn-block" data-toggle="modal" onclick="acceptOrder('<?php //echo $reklame[0]->no_invoice ?>')"  style="color: green" class="fas fa-check" value="Accept"><i class="fas fa-check">Accept</i></a>


     <!--  <a title="Accept" class="btn btn-info btn-block" data-placement="right" class="btn btn-danger"  href="#myModal"  onclick="acceptOrder('<?php echo $reklame[0]->no_invoice ?>')"  style="color: white" class="fas fa-check">Accept</a> -->
      <?php else : ?>
        <a type="submit" class="btn btn-danger btn-block" onclick="declineOrder('<?php echo $reklame[0]->no_invoice ?>')" style="color: white" value="Decline">
         <i class="fas fa-exclamation">Decline</i></a> 

         <!--  <a title="Accept" class="btn btn-info btn-block" data-placement="right" class="btn btn-danger"  href="#myModal"  onclick="acceptOrder('<?php echo $reklame[0]->no_invoice ?>')"  style="color: white" class="fas fa-check">Accept</a> -->
       <?php endif; ?>
     </div>
   </div>





<!-- 
<div class="card-header">
  <h4>List Gambar</h4>
  <a href="#" onclick="hapus_semua_gambar('<?php //echo $p->ID ?>')" class="btn btn-danger btn-sm" style="right: 0; margin-right: 25px; position: absolute;">Hapus Semua</a>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-striped" id="table-1">
      <thead>                                 
        <tr>
          <th class="text-center">
            #
          </th>
          <th>Gambar</th>
          <th>Keterangan</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>  
        <?php //foreach ($foto_reklame as $g) {
                            # code...
          ?>                               
          <tr>
            <td>
              1
            </td>
            <td>
              <img alt="image" src="<?php// echo base_url() ?>public/image/foto_reklame/thum/<?php// echo $g->foto ?>" width="100" data-toggle="tooltip" >
            </td>
            <td><?php// echo $g->keterangan ?></td>
            <td>
              <div class="btn-group mb-3 " role="group" aria-label="Basic example">

                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_gambar('<?php// echo $g->id_foto ?>','<?php// echo $p->ID ?>')">Hapus</button>
              </div>
            </td> 

          </tr>
        <?php //} ?> 
      </tbody>
    </table>

</div>
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