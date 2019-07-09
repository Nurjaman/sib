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
      <h1>Data Pemesanan</h1>
      
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
                    <th class="text-center">No Invoice</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Tools</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $order as $row) : ?>
                    <tr>
                      <td><?php echo ++$this->page ?>.</td>
                      <td >
                        <?php echo $row->no_invoice ?>
                        <a href="<?php echo base_url('admin/updateorder/'.$row->no_invoice); ?>"><i class="fas fa-eye">Lihat</i></a>
                      </td >
                      <td><?php echo $row->description ?></td>
                      <td><?php if($row->photo_order != '') : ?>
                      <img src="<?php echo base_url("public/image/path_order/{$row->photo_order}") ?>" height="100" width="100">
                      <?php endif; ?></td>
                      <td class="td-action">
                        <?php if($row->status_order == "0") : ?>
                          <p> Menunggu Tanggapan</p>
                          <?php else : ?>
                            <p> Done </p>
                          <?php endif; ?>
                        </td>
                        <td class="td-action"> 
                          <div class="button-action">


                            <?php if($row->status_order == "0") : ?>
                             <a  href="#" onclick="acceptOrder('<?php echo $row->no_invoice ?>')"  style="color: green">
                              <i class="fas fa-check">Accept</i></a>
                              <?php else : ?>
                                <a  href="#" onclick="declineOrder('<?php echo $row->no_invoice ?>')" style="color: red" >
                                 <i class="fas fa-exclamation">Decline</i></a> 
                               <?php endif; ?>

                               |

                               <a href="<?php echo base_url('admin/updateorder/'.$row->no_invoice); ?>"><i class="fas fa-edit">Edit</i></a> 
                               <a  href="#" onclick="hapus_order('<?php echo $row->no_invoice ?>')" class="text-danger"><i class="fas fa-trash">Hapus</i></a>
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


         <?php
         $this->load->view('include/footer', $this->data);


/* End of file data-order.php */
/* Location: ./application/views/admin/data-order.php */