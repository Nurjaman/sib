<?php 
	class Kode_otomatis extends CI_Controller {
		public function index(){
			$data['kode'] = $this->kode_m->kode();
			$data['tampil'] = $this->kode_m->tampil();
			$this->load->view('Kode_otomatis', $data);
		}

		public function inputbarang(){
			if($_POST){
				$barang = $this->input->post('namaBarang');
				$kodebarang = $this->input->post('kodeBarang');
				$stok = $this->input->post('stokBarang');
				$this->kode_m->inputBarang(array(
					'nama_barang' 		=> $barang,
					'kode_barang'		=> $kodebarang,
					'stok'		=>$stok
				));
			}
			redirect("Kode_otomatis");
		}
		
	}