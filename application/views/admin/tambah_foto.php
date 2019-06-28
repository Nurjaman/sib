<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header', $this->data);
?>
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="<?php echo base_url() ?>admin/portfolio" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <?php foreach ($reklame as $p) {
              # code...
            }?>
            <h1>Foto "<?php echo $p->name ?>"</h1>
            
          </div>

          <div class="section-body">
            

            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Gambar</h4>
                  </div>
                  <div class="card-body">
                    <form   action="<?php echo base_url() ?>admin/proses_tambah_gambar" method="POST" enctype="multipart/form-data" novalidate>
                     <input type="hidden" name="id_reklame" value="<?php echo $id_reklame ?>">
                     
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea rows="4" name="keterangan" class="form-control"></textarea>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                      <div class="col-sm-12 col-md-7">
                        <div  >
                          <input type="file" name="foto" id="image-upload" />
                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Tambah</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4>List Gambar</h4>
                    <a href="#" onclick="hapus_semua_gambar('<?php echo $p->ID ?>')" class="btn btn-danger btn-sm" style="right: 0; margin-right: 25px; position: absolute;">Hapus Semua</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>  
                          <?php foreach ($foto_reklame as $g) {
                            # code...
                          ?>                               
                          <tr>
                            <td>
                              1
                            </td>
                            <td>
                              <img alt="image" src="<?php echo base_url() ?>public/image/foto_reklame/thum/<?php echo $g->foto ?>" width="100" data-toggle="tooltip" >
                            </td>
                            <td><?php echo $g->keterangan ?></td>
                            <td>
                              <div class="btn-group mb-3 " role="group" aria-label="Basic example">
                               
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_gambar('<?php echo $g->id_foto ?>','<?php echo $p->ID ?>')">Hapus</button>
                              </div>
                            </td>
                            
                           
                             
                          </tr>
                          <?php } ?> 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php
$this->load->view('include/footer', $this->data);