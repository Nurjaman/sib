<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$amenities = @explode(', ', $reklame->amenities);
?>

<?php if ($this->session->userdata("role")=="Admin") : ?>
  <?php $this->load->view('include/header', $this->data); ?>
  <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
    <?php $this->load->view('include/header_buyer', $this->data); ?>
    <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
     <?php $this->load->view('include/header_seller', $this->data); ?>
   <?php endif; ?>


   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Perusahaan</h1>
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
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="nm_perusahaan" class="form-control" value="<?php echo $perusahaan[0]->nm_perusahaan ?>" placeholder="">
                      <p class="help-block"><?php  echo form_error('nm_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="jabatan_perusahaan" class="form-control" value="<?php echo $perusahaan[0]->jabatan_perusahaan ?>" placeholder="">
                      <p class="help-block"><?php  echo form_error('jabatan_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                  </div>


                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Direktur Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="direktur_perusahaan" class="form-control" value="<?php echo $perusahaan[0]->direktur_perusahaan ?>" placeholder="">
                      <p class="help-block"><?php  echo form_error('direktur_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kontak Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <small>Nama yang akan di catat di kontrak</small>
                      <input type="text" name="kontak_perusahaan" class="form-control" value="<?php echo $perusahaan[0]->kontak_perusahaan ?>" placeholder="">
                      <p class="help-block"><?php  echo form_error('kontak_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="mobile_perusahaan" class="form-control" value="<?php echo $perusahaan[0]->mobile_perusahaan ?>" placeholder="">
                      <p class="help-block"><?php  echo form_error('mobile_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fax Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="fax_perusahaan" class="form-control" value="<?php echo $perusahaan[0]->fax_perusahaan ?>" placeholder="">
                      <p class="help-block"><?php  echo form_error('fax_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                  </div>


                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea name="alamat_perusahaan" class="form-control" rows="8"><?php echo $perusahaan[0]->alamat_perusahaan ?></textarea>
                      <p class="help-block"><?php echo form_error('alamat_perusahaan', '<small class="text-red">', '</small>'); ?></p>
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