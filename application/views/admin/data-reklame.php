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

   <?php $id = $this->session->userdata('email');
   $this->db->select('*')
   ->FROM('users')
   ->where('email',$id);
   $query = $this->db->get()->result();
   foreach ($query as $q) : ?>

     <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Data Reklame</h1>

        </div>

        <div class="section-body">
         <h2 class="section-title">Sistem Informasi Billboard</h2>

         <p class="section-lead">Dimohon untuk mengisi Data Reklame dengan sedetail, agar<i>Customers</i>, mempermudah mengenali Reklame anda !
          <hr>
          <?php if ($this->session->userdata("role")=="Admin") : ?>
           <a  onclick="window.open('<?php echo base_url('admin/printReklameById/'.$q->userId); ?>','Cetak Data Reklame','width=650, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i> Print All By ID </a>
           || 
           <a  onclick="window.open('<?php echo base_url('admin/printReklameAll'); ?>','Cetak Data Reklame','width=650, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i> Print All Reklame </a>
           <br>
           <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
            <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
            <?php endif; ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">

                    <input type="text" name="id_user" class="form-control" value="<?php   echo $q->userId; ?>" hidden>
                  <?php endforeach; ?>

                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Fasilitas</th>
                          <th class="text-center">Deskripsi</th>
                          <th class="text-center">Photo</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach( $reklame as $row) : ?>
                          <tr>
                            <td><?php echo ++$this->page ?>.</td>
                            <td class="td-action" width="200">
                              <?php echo $row->name ?>

                              <?php if ($this->session->userdata("role")=="Admin") : ?>
                                <hr>
                                <a  onclick="window.open('<?php echo base_url('admin/printReklame/'.$row->ID); ?>','Cetak Data Reklame','width=1080, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i>Print</a>
                                <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
                                  <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
                                  <?php endif; ?>
                                </td>
                                <td><?php echo number_format($row->price) ?></td>
                                <td width="200"><small><?php echo word_limiter($row->address, 15) ?></small></td>
                                <td width="150"><small><?php echo $row->amenities ?></small></td>
                                <td width="200"><small><?php echo word_limiter($row->description, 15) ?></small></td>
                                <td>
                                  <?php if($row->photo != '') :  ?>
                                    <a class="example-image-link" href="<?php echo base_url("public/image/{$row->photo}") ?>" data-lightbox="example-set" data-title="Foto Order Client"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/{$row->photo}") ?>" height="100" width="100" /> </a>
                                    <?php else : ?>
                                     <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="100" width="100" /> </a>
                                   <?php endif; ?>


                                 </td> 

                                 <td width="250">
                                  <div class="button-action">
                                    <a href="<?php echo base_url('reklame/tambah_foto/'.$row->ID); ?>" style="color: green"><i class="fas fa-camera-retro">Tambah Foto</i></a> 
                                    <a href="<?php echo base_url('reklame/updatereklame/'.$row->ID); ?>"><i class="fas fa-edit">Edit</i></a> 
                                    <a  href="#" onclick="hapus_reklame('<?php echo $row->ID ?>')" class="text-danger"><i class="fas fa-trash">Hapus</i></a>


                                  </div> 
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


    <!--
<?php if(!$reklame) : ?>
<div class="col-md-5 col-md-offset-3">
  <div class="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Maa!</strong> Data yang anda cari tidak ditemukan.
  </div>
</div>
<?php endif; ?>
<div class="text-center" style="margin-bottom: 50px;">
  <?php echo $this->pagination->create_links(); ?>
</div>
    </div>
  </section>
</div>

-->


<?php
$this->load->view('include/footer', $this->data);


/* End of file data-reklame.php */
/* Location: ./application/views/data-reklame.php */