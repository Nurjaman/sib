<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
      <h1>Data Perusahaan</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Sistem Informasi Billboard</h2>

      <p class="section-lead">Isi data perusahaan bila Anda mewakili sebuah perusahaan atau isi dengan nama Anda bila <i>tidak mewakili perusahaan</i>.

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tulis data Perusahaan</h4>
              </div>
              <div class="card-body">
                  <form class="form-horizontal" action="<?php echo base_url().'user/addPerusahaan'; ?>" method="post" enctype="multipart/form-data">
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
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perusahaan</label>
                    <div class="col-sm-12 col-md-7">
                     <?php $id = $this->session->userdata('email');
                     $this->db->select('*')
                     ->FROM('users')
                     ->where('email',$id);
                     $query = $this->db->get()->result();
                     foreach ($query as $q) : ?>
                      <input type="hidden" name="id_user" class="form-control" value="<?php echo $q->userId; ?>" placeholder="Nama Perusahaan Tempat Anda Bekerja">
                    <?php endforeach; ?>


                    <input type="text" name="nm_perusahaan" class="form-control" value="<?php echo set_value('nm_perusahaan') ?>" placeholder="Nama Perusahaan Tempat Anda Bekerja">
                    <p class="help-block"><?php  echo form_error('nm_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan Anda</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="jabatan_perusahaan" class="form-control" value="<?php echo set_value('jabatan_perusahaan') ?>" placeholder="Jabatan Anda Di Perusahaan">
                    <p class="help-block"><?php  echo form_error('jabatan_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Direktur</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="direktur_perusahaan" class="form-control" value="<?php echo set_value('direktur_perusahaan') ?>" placeholder="Nama Direktur Ditempat Anda Bekerja">
                    <p class="help-block"><?php  echo form_error('direktur_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kontak</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="kontak_perusahaan" class="form-control" value="<?php echo set_value('kontak_perusahaan') ?>" placeholder="Nama Kontak Yang Akan Di Catat di Kontrak">
                    <p class="help-block"><?php  echo form_error('kontak_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telepon Kantor</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="mobile_perusahaan" class="form-control" value="<?php echo set_value('mobile_perusahaan') ?>" placeholder="Nomor Kantor, Ex : 022-1234567">
                    <p class="help-block"><?php  echo form_error('mobile_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fax Kantor</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="fax_perusahaan" class="form-control" value="<?php echo set_value('fax_perusahaan') ?>" placeholder="Masukan Nomor Fax">
                    <p class="help-block"><?php  echo form_error('fax_perusahaan', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap :</label>
                  <div class="col-sm-12 col-md-7">
                   <textarea name="alamat_perusahaan" class="form-control" rows="3"><?php echo set_value('alamat_perusahaan') ?></textarea>
                   <p class="help-block"><?php echo form_error('alamat_perusahaan', '<small class="text-red">', '</small>'); ?></p>
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