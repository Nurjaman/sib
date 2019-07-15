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
        <h1>Tambah User</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data User, di Pastikan data Benar !</h4>
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
                  <?php $id = $this->session->userdata('email');
                  $this->db->select('*')
                  ->FROM('users')
                  ->where('email',$id);
                  $query = $this->db->get()->result();
                  foreach ($query as $q) : ?>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="fullname" class="form-control" placeholder="Fullname User " type="text">
                       <p class="help-block"><?php  echo form_error('Fullname', '<small class="text-red">', '</small>'); ?></p>
                     </div>
                   </div>

                   <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                    <div class="col-sm-12 col-md-7">
                     <input name="username" class="form-control" placeholder="Username User" type="text">
                     <p class="help-block"><?php  echo form_error('Username', '<small class="text-red">', '</small>'); ?></p>
                   </div>
                 </div>

                 <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile</label>
                    <div class="col-sm-12 col-md-7">
                     <input name="mobile" class="form-control" placeholder="628901234" type="text">
                     <p class="help-block"><?php  echo form_error('mobile', '<small class="text-red">', '</small>'); ?></p>
                   </div>
                 </div>

                 <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                  <div class="col-sm-12 col-md-7">
                   <input name="email" class="form-control" placeholder="blabla@blabla.com" type="text">
                   <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
                 </div>

               </div>

               <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                <div class="col-sm-12 col-md-7">
                 <input name="password" class="form-control" placeholder="**********" type="password">
                 <p class="help-block"><?php  echo form_error('password', '<small class="text-red">', '</small>'); ?></p>
               </div>
               
             </div>


             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role :</label>
              <div class="col-sm-12 col-md-7">

               <select name="role" id="input" class="form-control">
                <option value="">---PILIH---</option>
                <option value="Admin">Admin</option>
                <option value="Penyewa">Penyewa</option>
                <option value="Pemilik Media">Pemilik Media</option>

              </select>
              <p class="help-block"><?php  echo form_error('role', '<small class="text-red">', '</small>'); ?></p>
            </div>
          </div>


          <div class="form-group row mb-4" style="margin-bottom: 50px;">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Tambahkan</button>
            </div>
          </div>

        <?php endforeach; ?>
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