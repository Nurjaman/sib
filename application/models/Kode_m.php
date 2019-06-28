<?php 
	class Kode_m extends CI_Model{
		public function tampil()   {    
			return $this->db->get('barang')->result();
		}

		public function inputBarang($data){
			$this->db->insert('barang', $data);
		}

		public function kode(){
		  $this->db->select('RIGHT(barang.kode_barang,2) as kode_barang', FALSE);
		  $this->db->order_by('kode_barang','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('barang');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->kode_barang) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('dmY'); 
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "BR"."5".$tgl.$batas;  //format kode
			  return $kodetampil;  
		 }
}