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
                          <th class="text-center">Kategori</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach( $kategori as $row) : ?>
                          <tr>
                            <td class="text-center"><?php echo ++$this->page ?>.</td>
                            <td class="text-center"><?php echo $row->name ?></td>
                            <td class="text-center"> 
                              <div class="button-action">
                                   <!-- <a href="<?php //echo base_url('admin/updateorder/'.$row->userId); ?>"><i class="fas fa-edit">Edit</i></a>  -->
                                   <a  href="#" onclick="hapus_kategori('<?php echo $row->category_id ?>')" class="text-danger"><i class="fas fa-trash">Hapus</i></a>
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