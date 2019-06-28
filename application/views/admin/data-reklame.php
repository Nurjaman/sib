<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);
?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Reklame</h1>
      
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
             <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Latitude</th>
                    <th class="text-center">Longitude</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Fasilitas</th>
                    <th class="text-center">Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach( $reklame as $row) : ?>
                  <tr>
                    <td><?php echo ++$this->page ?>.</td>
                  <td class="td-action" width="250">
                    <?php echo $row->name ?>
                   <div class="button-action">
                          <a href="<?php echo base_url('admin/tambah_foto/'.$row->ID); ?>" style="color: green"><i class="fas fa-camera-retro">Tambah Foto</i></a> 
                          <a href="<?php echo base_url('admin/updatereklame/'.$row->ID); ?>"><i class="fas fa-edit">Edit</i></a> 
                          <a  href="#" onclick="hapus_reklame('<?php echo $row->ID ?>')" class="text-danger"><i class="fas fa-trash">Hapus</i></a>
                        </div>  
                  </td>
                    <td><?php echo number_format($row->price) ?></td>
                    <td><?php echo $row->latitude ?></td>
                    <td><?php echo $row->longitude ?></td>
                    <td width="200"><small><?php echo word_limiter($row->address, 15) ?></small></td>
                    <td width="150"><small><?php echo $row->amenities ?></small></td>
                    <td width="200"><small><?php echo word_limiter($row->description, 15) ?></small></td>
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