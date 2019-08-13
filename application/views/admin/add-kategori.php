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
        <h1>Tambah Kategori</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data Kategori</h4>
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
                      <input name="name" class="form-control" placeholder="Kategori" type="text">
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