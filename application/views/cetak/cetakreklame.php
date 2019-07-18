<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- <style type="text/css" media="print">
  @page port {size:portrait;}
  @page land {size: landscape;}

  .potrait {page.port;}
  .landscape {page.land;}
  }
</style> -->



<!-- General CSS Files -->
<link rel="stylesheet" href="<?php echo base_url() ?>public/admin/modules/bootstrap/css/bootstrap.min.css">

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Reklame</h1>
    </div>
    <?php $id = $this->session->userdata('email');
    $this->db->select('*')
    ->FROM('users')
    ->where('email',$id);
    $query = $this->db->get()->result();
    foreach ($query as $q) : ?>
    <?php endforeach; ?>

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
                    <th class="text-center">Photo</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $reklame as $row) : ?>
                    <tr>
                      <td><?php echo ++$this->page ?>.</td>
                      <td class="td-action" width="250">
                        <?php echo $row->name ?>
                      </td>
                      <td><?php echo number_format($row->price) ?></td>
                      <td><?php echo $row->latitude ?></td>
                      <td><?php echo $row->longitude ?></td>
                      <td width="200"><small><?php echo word_limiter($row->address, 15) ?></small></td>
                      <td width="150"><small><?php echo $row->amenities ?></small></td>
                      <td width="200"><small><?php echo word_limiter($row->description, 15) ?></small></td>
                      <td width="200">  <?php if($row->photo != '') : ?>
                      <img src="<?php echo base_url("public/image/{$row->photo}") ?>" width="100" height="90">
                    <?php endif; ?>
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


<script type="text/javascript">


  var css = '@page { size: landscape; }',
  head = document.head || document.getElementsByTagName('head')[0],
  style = document.createElement('style');

  style.type = 'text/css';
  style.media = 'print';

  if (style.styleSheet){
    style.styleSheet.cssText = css;
  } else {
    style.appendChild(document.createTextNode(css));
  }

  head.appendChild(style);

  window.print();
</script>