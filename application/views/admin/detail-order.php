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
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Invoice</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="no_invoice" class="form-control" value="<?php echo $reklame[0]->no_invoice ?>" placeholder="">
                    <p class="help-block"><?php  echo form_error('no_invoice', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="fullname" class="form-control" value="<?php echo $reklame[0]->fullname ?>" placeholder="">
                    <p class="help-block"><?php  echo form_error('no_invoice', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">price</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="price" class="form-control" value="<?php echo $reklame[0]->price ?>" placeholder="">
                    <p class="help-block"><?php  echo form_error('no_invoice', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>
               



               


                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto :</label>
                  <div class="col-sm-3">
                   <input type="file" name="photo"  >
                 </div>
                 <div class="col-md-4">
                  <?php if($reklame[0]->photo != '') : ?>
                    <input type="text" value="<?php echo base_url("public/image/path_order/{$reklame[0]->photo}") ?>">
                    <img src="<?php echo base_url("public/image/path_order/{$reklame[0]->photo}") ?>" height="150">
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="description" class="form-control" value="<?php echo $reklame[0]->description ?>" placeholder="">
                  <p class="help-block"><?php  echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
                </div>
              </div>


              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                 <select name="status" id="input" class="form-control" >
                  <option value="<?php echo $reklame[0]->status?>">

                    <?php if($reklame[0]->status == "0") : ?>
                      Accept
                      <?php else : ?>
                        Decline
                      <?php endif; ?>

                    </option>
                    <option value = "">---PILIH---</option>
                    <option value = "1">Accept</option>
                    <option value = "0">Decline</option>
                  </select>
                  <p class="help-block"><?php  echo form_error('status', '<small class="text-red">', '</small>'); ?></p>
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


/* End of file detail-order.php */
/* Location: ./application/views/admin/detail-order.php */