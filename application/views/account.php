<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan Akun</h1>
        </div>

        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                   
                  <div class="card-body">
                    <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
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
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap : </label>
                          <div class="col-sm-12 col-md-7">
                              <input type="text"  name="name" class="form-control" value="<?php echo $user[0]->fullname ?>" placeholder="">
                                <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email : </label>
                          <div class="col-sm-12 col-md-7">
                              <input type="email" name="email" class="form-control" value="<?php echo $user[0]->email ?>" placeholder="">
                                <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username : </label>
                          <div class="col-sm-12 col-md-7">
                              <input type="text" name="username" class="form-control" value="<?php echo $user[0]->username ?>" placeholder="">
                                <p class="help-block"><?php  echo form_error('username', '<small class="text-red">', '</small>'); ?></p>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru : </label>
                          <div class="col-sm-12 col-md-7">
                              <input type="password" name="new_pass" class="form-control" value="<?php echo set_value('new_pass') ?>" placeholder="">
                                <p class="help-block"><?php  echo form_error('new_pass', '<small class="text-red">', '</small>'); ?></p>
                                <p class="help-block"><small>Tinggalkan langkah ini bila tidak ingin menggati password</small></p>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Lama : </label>
                          <div class="col-sm-12 col-md-7">
                              <input type="password" name="old_pass" class="form-control" value="<?php echo set_value('old_pass') ?>" placeholder="">
                                <p class="help-block"><?php  echo form_error('old_pass', '<small class="text-red">', '</small>'); ?></p>
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

/* End of file account.php */
/* Location: ./application/views/account.php */