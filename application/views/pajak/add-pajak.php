<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Nilai Pajak</h1>
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
                 <input  type="text" name="id_pajak" value="">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Reklame :</label>
                <div class="col-sm-12 col-md-7">
                   <select name="jenis_reklame" id="input" class="form-control">
                      <option value = "">---PILIH---</option>
                    <?php 
                    foreach ($this->db->get('categories')->result() as $jenis => $row) 
                    {
                                        # code...
                        echo '<option value"'.$row->name.'">'.$row->name.'</option>';
                    }
                    ?>
                </select>
                <p class="help-block"><?php  echo form_error('jenis_reklame', '<small class="text-red">', '</small>'); ?></p>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran :</label>
              <div class="col-sm-12 col-md-7">
                <select name="ukuran" id="input" class="form-control">
                   <option value = "">---PILIH---</option>
                   <option value = "< 7 Meter"> < 7 Meter </option>
                   <option value = "7 Meter s.d < 41 Meter"> 7 Meter s.d 41 Meter </option>
                   <option value = ">= 41 Meter"> >= 41 Meter </option>
               </select>
           <p class="help-block"><?php  echo form_error('ukuran', '<small class="text-red">', '</small>'); ?></p>
       </div>
   </div>
   <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Ukuran :</label>
    <div class="col-sm-12 col-md-7">
        <input placeholder="Harga untuk Ukuran Reklame" onkeypress="return hanyaAngka(event)" type="text" name="harga_ukuran" class="form-control" value="<?php echo set_value('harga_ukuran') ?>">
        <p class="help-block"><?php  echo form_error('harga_ukuran', '<small class="text-red">', '</small>'); ?></p>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Ketinggian (Rp/Meter) </label>
    <div class="col-sm-12 col-md-7">
        <input placeholder="Harga untuk Ketinggian Reklame" onkeypress="return hanyaAngka(event)" type="text" name="harga_ketinggian" class="form-control" value="<?php echo set_value('harga_ketinggian') ?>">
        <p class="help-block"><?php  echo form_error('harga_ketinggian', '<small class="text-red">', '</small>'); ?></p>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Batas Minimal Masa Pajak / Tahun :</label>
    <div class="col-sm-12 col-md-7">
        <input placeholder="1 Tahun / 1 Bulan .. dsb" type="text" name="tahun_pajak" class="form-control" value="<?php echo set_value('tahun_pajak') ?>">
        <p class="help-block"><?php  echo form_error('tahun_pajak', '<small class="text-red">', '</small>'); ?></p>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan :</label>
    <div class="col-sm-12 col-md-7">
        <input placeholder="Tambahkan jika ada keterangan / catatan" type="text" name="ket" class="form-control" value="<?php echo set_value('ket') ?>">
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