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

         <p class="section-lead">Data Perusahaan, Isi Data Perusahaan jika ingin Pesan Reklame.
          <hr>
          <?php if ($this->session->userdata("role")=="Admin") : ?>
           <a  onclick="window.open('<?php echo base_url('admin/printUserById/'.$q->userId); ?>','Cetak Data Reklame','width=650, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i> Print All By ID </a>
           || 
           <a  onclick="window.open('<?php echo base_url('admin/printUserAll'); ?>','Cetak Data Reklame','width=650, height=800','size:landscape').print()"  href="#" class="btn btn-info" target="_blank"/><i class="fa fa-print" style="color:red"> </i> Print All User </a>
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
                          <th class="text-center">Nama Perusahaan</th>
                          <th class="text-center">Nama Direktur Perusahaan</th>
                          <th class="text-center">Nama di Kontak Pemesanan</th>
                          <th class="text-center">Nomer Perusahaan</th>
                          <th class="text-center">Alamat Perusahaan</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach( $perusahaan as $row) : ?>
                          <tr>
                            <td><?php echo ++$this->page ?>.</td>
                            <td> <?php echo $row->nm_perusahaan ?> </td>
                            <td> <?php echo $row->direktur_perusahaan ?> </td>
                            <td> <?php echo $row->kontak_perusahaan ?> </td>
                            <td>
                              <?php if ($this->session->userdata("role")=="Admin") : ?>
                                <a href="https://api.whatsapp.com/send?phone=<?php  echo $row->mobile_perusahaan ?>&text=Halo, saya dari Admin SIB."> <p class="fab fa-whatsapp"><?php  echo $row->mobile_perusahaan ?></a>
                                <?php else: ?>
                                  <?php  echo $row->mobile_perusahaan ?>
                                <?php endif; ?>
                                </td>
                                  <td> <?php echo $row->alamat_perusahaan ?> </td>

                                  <td class="td-action"> 
                                    <div class="button-action">
                                     <a href="<?php echo base_url('reklame/updateperusahaan/'.$row->id_perusahaan); ?>"><i class="fas fa-edit">Edit</i></a> 
                                     <a  href="#" onclick="hapus_perusahaan('<?php echo $row->id_perusahaan ?>')" class="text-danger"><i class="fas fa-trash">Hapus</i></a>
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