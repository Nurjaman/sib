<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('include/header_buyer', $this->data);
?>

<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Home</h1>
          </div>

          <div class="section-body">
          	<h2 class="section-title">Sistem Informasi Billboard</h2>
             
          	<p class="section-lead">Sistem Informasi Billboard dibuat untuk mempermudah pemetaan billboard yang ada dengan <i>cepat dan effisien.</i>

          	<div class="row">
              <div class="col-12">
                <div class="card">
                   
                  <div class="card-body">
                  	<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama Pengembang</td>
								<td width="50" class="text-center">:</td>
								<td><b style="color:green">Mochamad Nurjaman</b></td>
							</tr>
							<tr>
								<td>email</td>
								<td width="50" class="text-center">:</td>
								<td><b style="color:green">nurzaman02@gmail.com</b></td>
							</tr>
							 
							<tr>
								<td>Alamat</td>
								<td width="50" class="text-center">:</td>
								<td><b style="color:green">Jl. Cihanjuang , Gg.Ledeng 1 no 137, Rt 03/09 , Kecamatan Cimahi Utara</b></td>
							</tr>
							<tr>
								<td>Nomor Telepon</td>
								<td width="50" class="text-center">:</td>
								<td><a href="https://api.whatsapp.com/send?phone=6289672255644&text=Halo, Nurjaman, saya mau tanya-tanya mengenai SIB nya">0896-7225-5644</a></td>
							</tr>
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

/* End of file main-admin.php */
/* Location: ./application/views/main-admin.php */