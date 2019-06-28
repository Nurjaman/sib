<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Reklame</h1>
        </div>

        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                </div>
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
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name') ?>" placeholder="">
                    <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori :</label>
                <div class="col-sm-12 col-md-7">

                   <select name="jenis_media" id="input" class="form-control">
                    <option value="">---PILIH---</option>
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
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga :</label>
            <div class="col-sm-12 col-md-7">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control"  name="price"  value="<?php echo set_value('price') ?>" aria-label="Amount">
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>
            </div>
            <p class="help-block"><?php  echo form_error('price', '<small class="text-red">', '</small>'); ?></p>
        </div>
    </div>


    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fasilitas :</label>
        <div class="col-sm-12 col-md-7">
            <div class="selectgroup selectgroup-pills">
                <?php foreach($this->amenities as $value) : ?>
                    <label class="selectgroup-item">
                      <input type="checkbox"   value="<?php echo $value; ?>" name="amenities[]" class="selectgroup-input"  >
                      <span class="selectgroup-button"><?php echo $value; ?></span>
                  </label>

              <?php endforeach; ?>
          </div>
      </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Orientasi :</label>
    <div class="col-sm-12 col-md-7">
       <select name="orientasi" id="input" class="form-control">
        <option value="">---PILIH---</option>
        <option value="Vertical">Vertical</option>
        <option value="Horizontal">Horizontal</option>
        <option value="Other">Other</option>
    </select>
    <p class="help-block"><?php  echo form_error('orientasi', '<small class="text-red">', '</small>'); ?></p>
</div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran :</label>
    <div class="col-sm-12 col-md-7">
        <input placeholder="Ukuran pada Reklame" type="text" name="ukuran" class="form-control" value="<?php echo set_value('ukuran') ?>">
        <p class="help-block"><?php  echo form_error('ukuran', '<small class="text-red">', '</small>'); ?></p>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position :</label>
    <div class="col-sm-12 col-md-7">
        <select name="position" id="input" class="form-control">
            <option value="">---PILIH---</option>
            <option value="Stand Alone">Stand Alone</option>
            <option value="Bridge">Bridge</option>
            <option value="Attached to Building">Attached to Building</option>
            <option value="Other">Other</option>
        </select>
        <p class="help-block"><?php  echo form_error('position', '<small class="text-red">', '</small>'); ?></p>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lighting :</label>
    <div class="col-sm-12 col-md-7">
     <select name="lighting" id="input" class="form-control">
        <option value="">---PILIH---</option>
        <option value="Backlight">Backlight</option>
        <option value="Frontlight">Frontlight</option>
        <option value="LED">LED</option>
        <option value="EL Panel">EL Panel</option>
        <option value="No Light">No Light</option>
        <option value="Other">Other</option>
    </select>
    <p class="help-block"><?php  echo form_error('lighting', '<small class="text-red">', '</small>'); ?></p>
</div>
</div>


<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat :</label>
    <div class="col-sm-3">
        <div class="input-group">
            <input id="input-calendar" type="text" name="latitude" class="form-control" value="<?php echo set_value('latitude') ?>" placeholder="latitude">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
        </div>
        <p class="help-block"><?php echo form_error('latitude', '<small class="text-red">', '</small>'); ?></p>
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-3">
        <div class="input-group">
            <input id="input-calendar" type="text" name="longitude" class="form-control" value="<?php echo set_value('longitude') ?>" placeholder="longitude">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
        </div>
        <p class="help-block"><?php echo form_error('longitude', '<small class="text-red">', '</small>'); ?></p>
    </div>
    <div class="col-sm-3"></div>

    <div class="col-sm-12 col-md-7" >
        <?php echo $map['html'] ?>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto :</label>
    <div class="col-sm-5">
       <input type="file" name="photo">
   </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap :</label>
    <div class="col-sm-12 col-md-7">
       <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat') ?></textarea>
       <p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
   </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi :</label>
    <div class="col-sm-12 col-md-7">
       <textarea name="description" class="form-control" rows="8"><?php echo set_value('description') ?></textarea>
       <p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
   </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link :</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" placeholder="https://example.com" name="link" class="form-control" value="<?php echo set_value('link') ?>">
        <p class="help-block"><?php  echo form_error('link', '<small class="text-red">', '</small>'); ?></p>
        <input type="text" name="status" value="Tersedia">
    </div>
</div>
<div class="form-group row mb-4" style="margin-bottom: 50px;">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
    <div class="col-sm-12 col-md-7">
        <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Tambahkan</button>
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


/* End of file add-reklame.php */
/* Location: ./application/views/add-reklame.php */