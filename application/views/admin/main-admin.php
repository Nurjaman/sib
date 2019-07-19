<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="<?php echo base_url() ?>public/js/Chart.js"></script>

<?php if ($this->session->userdata("role")=="Admin") : ?>
	<?php $this->load->view('include/header', $this->data); ?>
	<?php elseif ($this->session->userdata("role")=="Penyewa") : ?>
		<?php $this->load->view('include/header_buyer', $this->data); ?>
		<?php elseif ($this->session->userdata("role")=="Pemilik Media") : ?>
			<?php $this->load->view('include/header_seller', $this->data); ?>
		<?php endif; ?>

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
											<div style="width: 100%;height: 500px">
												<canvas id="myChart"></canvas>
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Statistik Pemesanan Billboard',
					data: [<?php echo $dataJanuari?>, <?php echo $dataFebruari;?>, <?php echo $dataMaret;?>, <?php echo $dataApril;?>, <?php echo $dataMei;?>, <?php echo $dataJuni;?> , <?php echo $dataJuli;?> , <?php echo $dataAgustus;?>, <?php echo $dataSeptember;?> , <?php echo $dataOktober;?> , <?php echo $dataNovember;?> , <?php echo $dataDesember;?>],
					backgroundColor: [
					'rgba(139,0,0, 0.2)',
					'rgba(255,140,0, 0.2)',
					'rgba(218,165,32, 0.2)',
					'rgba(128,128,0, 0.2)',
					'rgba(255,255,0, 0.2)',
					'rgba(154,205,50, 0.2)',
					'rgba(173,255,47, 0.2)',
					'rgba(0,100,0, 0.2)',
					'rgba(0,128,128, 0.2)',
					'rgba(0,255,255, 0.2)',
					'rgba(65,105,225, 0.2)',
					'rgba(238,130,238, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(215, 159, 64, 1)',
					'rgba(225, 169, 65, 1)',
					'rgba(215, 179, 66, 1)',
					'rgba(225, 189, 67, 1)',
					'rgba(215, 199, 66, 1)',
					'rgba(221, 189, 67, 1)',
					'rgba(245, 199, 66, 1)',
					
					
					
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>


			<?php
			$this->load->view('include/footer', $this->data);

			/* End of file main-admin.php */
/* Location: ./application/views/main-admin.php */