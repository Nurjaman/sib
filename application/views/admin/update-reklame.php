<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);

$amenities = @explode(', ', $reklame->amenities);
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Reklame</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-4">
                  <?php if($this->session->flashdata('message')) : ?>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-8">
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          <?php echo $this->session->flashdata('message'); ?>
                        </div>
                      </div>
                      
                    </div>
                  <?php endif; ?>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="name" class="form-control" value="<?php echo $reklame->name ?>" placeholder="">
                    <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori :</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="jenis_media" id="input" class="form-control">
                      <option value="<?php echo $reklame->jenis_media ?>"><?php echo $reklame->jenis_media ?></option>
                      <option value = "">---PILIH---</option>
                      <?php 
                      foreach ($this->db->get('categories')->result() as $jenis_media => $row) 
                      {
                                        # code...
                        echo '<option value"'.$row->name.'">'.$row->name.'</option>';
                      }
                      ?>
                    </select>
                    <p class="help-block"><?php  echo form_error('jenis_media', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                  <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="ukuran" class="form-control" value="<?php echo $reklame->ukuran ?>" placeholder="">
                    <p class="help-block"><?php  echo form_error('ukuran', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Orientasi :</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="orientasi" id="input" class="form-control" >
                      <option value="<?php echo $reklame->orientasi ?>"><?php echo $reklame->orientasi ?></option>
                      <option value = "">---PILIH---</option>
                      <option value = "Vertical">Vertical</option>
                      <option value = "Horizontal">Horizontal</option>
                      <option value = "Other">Other</option>
                    </select>
                    <p class="help-block"><?php  echo form_error('orientasi', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position :</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="position" id="input" class="form-control" >
                      <option value="<?php echo $reklame->position ?>"><?php echo $reklame->position ?></option>
                      <option value = "">---PILIH---</option>
                      <option value = "Stand Alone">Stand Alone</option>
                      <option value = "Bridge">Bridge</option>
                      <option value = "Attached to Building">Attached to Building</option>
                      <option value = "Other">Other</option>
                    </select>
                    <p class="help-block"><?php  echo form_error('position', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pencahayaan :</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="lighting" id="input" class="form-control" >
                      <option value="<?php echo $reklame->lighting ?>"><?php echo $reklame->lighting ?></option>
                      <option value = "">---PILIH---</option>
                      <option value = "Backlight">Backlight</option>
                      <option value = "Frontlight">Frontlight</option>
                      <option value = "LED">LED</option>
                      <option value = "EL Panel">EL Panel</option>
                      <option value = "No Light">No Light</option>
                      <option value = "Other">Other</option>
                    </select>
                    <p class="help-block"><?php  echo form_error('lighting', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga :</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="price" class="form-control" value="<?php echo $reklame->price ?>">
                    <p class="help-block"><?php  echo form_error('price', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fasilitas :</label>
                  <div class="col-sm-12 col-md-7">
                    <div class="selectgroup selectgroup-pills">
                      <?php foreach($this->amenities as $value) : ?>
                        <label class="selectgroup-item">
                          <input type="checkbox" value="<?php echo $value; ?>" name="amenities[]" <?php if(@in_array($value, $amenities)) echo 'checked'; ?> class="selectgroup-input">
                          <span class="selectgroup-button"><?php echo $value; ?></span>
                        </label>

                      <?php endforeach; ?>
                    </div>

                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat :</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input id="input-calendar" type="text" name="latitude" class="form-control" value="<?php echo $reklame->latitude ?>" placeholder="latitude">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    </div>
                    <p class="help-block"><?php echo form_error('latitude', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input id="input-calendar" type="text" name="longitude" class="form-control" value="<?php echo $reklame->longitude ?>" placeholder="longitude">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    </div>
                    <p class="help-block"><?php echo form_error('longitude', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                  <div class="col-sm-3"></div>
                  <div class="col-sm-12 col-md-7"  >
                    <?php echo $map['html'] ?>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto :</label>
                  <div class="col-sm-3">
                   <input type="file" name="photo"  >
                 </div>
                 <div class="col-md-4">
                  <?php if($reklame->photo != '') : ?>
                    <img src="<?php echo base_url("public/image/{$reklame->photo}") ?>" height="150">
                  <?php endif; ?>
                </div>
              </div>
              
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap :</label>
                <div class="col-sm-12 col-md-7">
                 <textarea name="alamat" class="form-control" rows="3"><?php echo $reklame->address ?></textarea>
                 <p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
               </div>
             </div>
             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi :</label>
              <div class="col-sm-12 col-md-7">
               <textarea name="description" class="form-control" rows="8"><?php echo $reklame->description ?></textarea>
               <p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
             </div>
           </div>
           <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link :</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="link" class="form-control" value="<?php echo $reklame->link ?>">
              <p class="help-block"><?php  echo form_error('link', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status :</label>
            <div class="col-sm-12 col-md-7">
              <div class="radio-inline" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="radio" id="option1" autocomplete="off" name="status" value="Tersedia" <?php if($reklame->status=='Tersedia'){echo 'checked';}?>/>
                  <b style="color:white">Tersedia</b>
                </label>
                <labe class="btn btn-primary">
                  <input type="radio" id="option2" autocomplete="off" name="status" value="Tidak Tersedia" <?php if($reklame->status=='Tidak Tersedia'){echo 'checked';}?>/>
                  <b style="color:red">Tidak Tersedia</b>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row mb-4" style="margin-bottom: 50px;">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div>
<?php
$this->load->view('include/footer', $this->data);


/* End of file update-reklame.php */
/* Location: ./application/views/update-reklame.php */