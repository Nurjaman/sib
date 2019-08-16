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
          <h1>Data User</h1>
        </div>
        <div class="section-body">
         <h2 class="section-title">Sistem Informasi Billboard</h2>

         <p class="section-lead">Data User, hanya dapat dilihat oleh Admin.
          <hr>
          <?php if ($this->session->userdata("role")=="Admin") : ?>
           <a  onclick="window.open('<?php echo base_url('admin/printUserById/'.$q->userId); ?>','Cetak Data User','width=650, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i> Print All By ID </a>
           || 
           <a  onclick="window.open('<?php echo base_url('admin/printUserAll'); ?>','Cetak Data Users','width=650, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i> Print All User </a>
           <br>
           <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
            <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
            <?php endif; ?>
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
                          <th class="text-center">Email</th>
                          <th class="text-center">Mobile</th>
                          <th class="text-center">Username</th>
                          <th class="text-center">Role</th>
                          <th class="text-center">Photo</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach( $reklame as $row) : ?>
                          <tr>
                            <td><?php echo ++$this->page ?>.</td>
                            <td >
                              <?php echo $row->email ?>
                              <?php if ($this->session->userdata("role")=="Admin") : ?>
                                 <a href="<?php echo base_url('admin/updateuser/'.$row->userId); ?>"><i class="fas fa-eye">Lihat</i></a>
                                <br>
                                <a  onclick="window.open('<?php echo base_url('admin/printUser/'.$row->userId); ?>','Cetak Data Order','width=1080, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i>Print</a>
                                <?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
                                  <?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
                                  <?php endif; ?>


                                </td>
                                <td><a href="https://api.whatsapp.com/send?phone=<?php  echo $row->mobile ?>&text=Halo, saya dari Admin SIB, kami ingin memastikan bahwa ini nomer,  <?php  echo $row->fullname ?>. kalo benar, cukup di balas dengan '1' . Terimakasih "> <p class="fab fa-whatsapp"><?php  echo $row->mobile ?></a></td>
                                  <td><?php echo $row->username ?></td>
                                  <td><?php echo $row->role ?></td>
                                  <td>
                                    <?php if($row->photo_profile != '') :  ?>
                                      <a class="example-image-link" href="<?php echo base_url("public/image/foto_user/{$row->photo_profile}") ?>" data-lightbox="example-set" data-title="Foto User"><img  alt="Bootstrap template" src="<?php echo base_url("public/image/foto_user/{$row->photo_profile}") ?>" height="100" width="100" /> </a>
                                      <?php else : ?>
                                       <img src="<?php echo base_url("public/image/no_image.jpg") ?>" height="100" width="100" /> </a>
                                     <?php endif; ?>
                                   </td>
                                   <td class="td-action">
                                    <?php if($row->status_aktif == "0") : ?>
                                      <p> Menunggu Tanggapan</p>
                                      <?php else : ?>
                                        <p> Aktif </p>
                                      <?php endif; ?>
                                    </td>
                                    <td class="td-action"> 
                                      <div class="button-action">


                                        <?php if($row->status_aktif == "0") : ?>
                                         <a  href="#" onclick="acceptUser('<?php echo $row->userId ?>')"  style="color: green">
                                          <i class="fas fa-check">Accept</i></a>
                                          <?php else : ?>
                                            <a  href="#" onclick="declineUser('<?php echo $row->userId ?>')" style="color: red" >
                                             <i class="fas fa-exclamation">Decline</i></a> 
                                           <?php endif; ?>

                                           |

                                           <a  href="#" onclick="hapus_user('<?php echo $row->userId ?>')" class="text-danger"><i class="fas fa-trash">Hapus</i></a>
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