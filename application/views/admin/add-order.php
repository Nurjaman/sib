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
        <h1>Tambah Order</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data Order, di Pastikan data Benar !</h4>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Invoice</label>
                      <div class="col-sm-12 col-md-7">
                       <input name="status_order" class="form-control" value="0" type="text"readonly>
                       <input name="no_invoice" class="form-control" value="<?php echo $invoice;?>" type="text"readonly>
                     </div>
                   </div>

                   <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ID_User :</label>
                    <div class="col-sm-12 col-md-7">

                     <select name="id_user" id="input" class="form-control">
                      <option value="">---PILIH---</option>
                      <?php 
                      foreach ($this->db->get('users')->result() as $id_user => $row) 
                      {
                        echo '<option value"'.$row->userId.'">'.$row->userId.'</option>';
                      }
                      ?>
                    </select>
                    <p class="help-block"><?php  echo form_error('id_user', '<small class="text-red">', '</small>'); ?></p>
                  </div>
                </div>


                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reklame :</label>
                  <div class="col-sm-12 col-md-7">

                   <select name="id_reklame" id="input" class="form-control">
                    <option value="">---PILIH---</option>
                    <?php 
                    foreach ($this->db->get('reklame')->result() as $id_reklame => $row1) 
                    {
                      echo '<option value"'.$row1->ID.'">'.$row1->ID.'</option>';
                    }
                    ?>
                  </select>
                  <p class="help-block"><?php  echo form_error('id_reklame', '<small class="text-red">', '</small>'); ?></p>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto :</label>
                <div class="col-sm-5">
                 <input type="file" name="photo_order">
               </div>
             </div>
             <div class="form-group row mb-4 col">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi :</label>
              <div class="col-sm-12 col-md-7">
               <textarea name="description" class="form-control" rows="3"><?php echo set_value('description') ?></textarea>
               <p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
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