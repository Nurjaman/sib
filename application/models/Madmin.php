<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('upload','session'));
	}
	// Membuat Function Login
	// =========================
	// Fungsi cek session
	public function logged_id()
	{
		return $this->session->userdata('userId');
	}

	//Fungsi Check Login
	public function check_login($table, $field1, $field2)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1);
		$this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return "tes";
		}
	}

    //Membuat fungsi Invoice
	function get_no_invoice(){
		$q = $this->db->query("SELECT MAX(RIGHT(no_invoice,4)) AS kd_max FROM tbl_order WHERE DATE(tanggal)=CURDATE()");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%04s", $tmp);
			}
		}else{
			$kd = "0001";
		}
		date_default_timezone_set('Asia/Jakarta');
		return date('dmy').$kd;
	}



	public function createReklame()
	{
		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'id_user' => $this->input->post('id_user'),

			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'amenities' => @implode(", ", @$this->input->post('amenities')),
			'description' => $this->input->post('description'),

			'jenis_media' => $this->input->post('jenis_media'),
			'orientasi' => $this->input->post('orientasi'),
			'ukuran' => $this->input->post('ukuran'),
			'lighting' => $this->input->post('position'),
			'position' => $this->input->post('lighting'),

			'link' => $this->input->post('link'),
			'status' => $this->input->post('status'),
		);

		$this->db->insert('reklame', $object);

		$IDReklame = $this->db->insert_id();

		if( is_array($this->input->post('categories')) )
		{
			$this->db->where('reklame_id', $IDReklame)
			->where_not_in('category_id', $this->input->post('categories'))
			->delete('reklameCategories');
			foreach ($this->input->post('categories') as $key => $value) 
			{
				$this->db->insert('reklameCategories', array(
					'reklame_id' => $IDReklame,
					'category_id' => $value
				));
			}
		}

		$this->session->set_flashdata('message', "Data berhasil ditambahkan");
	}


	public function getReklame($param = 0)
	{
		return $this->db->get_where('reklame', array('ID' => $param) )->row();
	}

	public function categoryReklame($reklame = 0, $category = 0)
	{
		return $this->db->get_where('reklameCategories', array('reklame_id' => $reklame, 'category_id' => $category) )->row();
	}

	public function updateReklame($param = 0)
	{
		$reklame = $this->getReklame($param);

		// $config['upload_path'] = dirname($_SERVER["DOCUMENT_ROOT"]).'/public/image/';
		// $config['allowed_types'] = 'gif|jpg|png';
		// $config['max_width']  = 1024*3;
		// $config['max_height']  = 768*3;
		
		// $this->upload->initialize($config);
		// $photo='';
		// if ( ! $this->upload->do_upload('photo'))
		// {
		// 	$photo = $reklame->photo; 
		// 	// $photo = ""; 
		// 	$this->session->set_flashdata('message', $this->upload->display_errors());
		// } else{
		// 	$photo = $this->upload->file_name;
		// }

		//tes

		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}





		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'amenities' => @implode(", ", @$this->input->post('amenities')),
			'description' => $this->input->post('description'),
			'link' => $this->input->post('link'),
			'status' => $this->input->post('status'),
			
			'jenis_media' => $this->input->post('jenis_media'),
			'orientasi' => $this->input->post('orientasi'),
			'ukuran' => $this->input->post('ukuran'),
			'lighting' => $this->input->post('position'),
			'position' => $this->input->post('lighting'),


		);

		$this->db->update('reklame', $object, array('ID' => $param));

		if( is_array($this->input->post('categories')) )
		{
			$this->db->where('reklame_id', $param)
			->where_not_in('category_id', $this->input->post('categories'))
			->delete('reklameCategories');
			foreach ($this->input->post('categories') as $key => $value) 
			{
				$this->db->insert('reklameCategories', array(
					'reklame_id' => $param,
					'category_id' => $value
				));
			}
		} else {
			$this->db->where('reklame_id', $param)
			->where_not_in('category_id', $this->input->post('categories'))
			->delete('reklameCategories');
		}

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function getAllReklame($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'desc');

		if($type == 'num')
		{
			return $this->db->get('reklame')->num_rows();
		} else {
			return $this->db->get('reklame', $limit, $offset)->result();
		}
	}

	public function getWhereReklame($limit = 10, $offset = 0, $type = 'result', $id_user)
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'desc');

		if($type == 'num')
		{
			return $this->db->get('reklame')->num_rows();

		} else {
			
			$this->db->where('id_user', $id_user);
			return $this->db->get('reklame', $limit, $offset)->result();
		}
	}


	public function getReklameWhere($where,$limit = 10, $offset = 0, $type = 'result')
	{
		



		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'desc');

		if($type == 'num')
		{
			$this->db->select('*');
			$this->db->from('reklame');
			$this->db->where('id_user',$where);
			$query = 	$this->db->get('reklame')->num_rows();
			return $query->result();
		} else {
			return $this->db->get('reklame', $limit, $offset)->result();
		}
	}

	public function deleteReklame($param = 0)
	{
		$reklame = $this->getReklame($param);

		if( $reklame->photo != '')
			@unlink(".pulbic/image/{$reklame->photo}");
		$this->db->delete('foto_reklame', array('id_reklame' => $param));
		$this->db->delete('reklame', array('ID' => $param));
		$this->db->delete('reklameCategories', array('reklame_id' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil dihapus");
	}

	public function setAccount()
	{
		$user = $this->getAccount();

		$object = array(
			'fullname' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email')
		);

		if( $this->input->post('new_pass') != '')
			$object['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);
		
		$this->db->update('users', $object, array('userId' => $user->userId));

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan.");
	}

	public function getAccount()
	{
		return $this->db->get_where('users', array('userId' => $this->session->userdata('user')->userId) )->row();
	}

	public function select_reklame_id($id){
		$this->db->SELECT('*')
		->FROM('reklame')
		->WHERE('ID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function select_foto_id($id){
		$this->db->SELECT('*')
		->FROM('foto_reklame')
		->WHERE('id_reklame',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function proses_tambah_gambar(){
		$this->load->library('upload');
		$this->load->library('image_lib');
		$id_reklame = $this->input->post('id_reklame');
        $namafile 	= url_title($this->input->post('nama')).time(); //nama file + fungsi time
        $config['upload_path']	= './public/image/foto_reklame/asli/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types']= 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']		= '1072'; //maksimum besar file 1M
        $config['max_width']	= '5000'; //lebar maksimum 5000 px
        $config['max_height']	= '5000'; //tinggi maksimu 5000 px
        $config['file_name']	= strtolower($namafile); //nama yang terupload nantinya

        $this->upload->initialize($config);

        if($_FILES['foto']['name']){
        	if ($this->upload->do_upload('foto')){
        		$foto	= $this->upload->data();
        		$simpan_data=array(
        			'keterangan'  				=> html_escape($this->input->post('keterangan', TRUE)),
        			'id_reklame'  				=> html_escape($this->input->post('id_reklame', TRUE)),
        			'foto'					=> $foto['file_name'],

        		);
        		$simpan = $this->db->insert('foto_reklame', $simpan_data);

				//Resize 1
        		$config2['image_library']	= 'gd2'; 
        		$config2['source_image']	= './public/image/foto_reklame/asli/'.$foto['file_name'];
				$config2['new_image']		= './public/image/foto_reklame/thum/'; // folder tempat menyimpan hasil resize
				$config2['maintain_ratio']	= FALSE;
				$config2['width']			= 700;
				$config2['height']			= 393;
				
				$this->image_lib->clear();
				$this->image_lib->initialize($config2);
				$this->image_lib->resize();
				
				if (!$this->image_lib->resize()){
					//Error gagal resize
					$this->session->set_flashdata('pesan',$this->image_lib->display_errors());
					$recall = array(
						'keterangan'  				=> html_escape($this->input->post('keterangan', TRUE)),
						'id_reklame'  				=> html_escape($this->input->post('id_reklame', TRUE)),
					);
					$this->session->set_tempdata($recall,NULL, 60);
					redirect(base_url("admin/tambah_foto/$id_reklame"));
				}
				return $simpan;
			}else{
				//Error saat upload file
				$this->session->set_flashdata('pesan',$this->upload->display_errors());
				$recall = array(
					'keterangan'  				=> html_escape($this->input->post('keterangan', TRUE)),
					'id_reklame'  				=> html_escape($this->input->post('id_reklame', TRUE)),
				);
				$this->session->set_tempdata($recall,NULL, 60);
				redirect(base_url("admin/tambah_foto/$id_reklame"));
			}
		}else{
			$this->session->set_flashdata('pesan',$this->upload->display_errors());
			$recall = array(
				'keterangan'  				=> html_escape($this->input->post('keterangan', TRUE)),
				'id_reklame'  				=> html_escape($this->input->post('id_reklame', TRUE)),
			);
			$this->session->set_tempdata($recall,NULL, 60);
			redirect(base_url("admin/tambah_foto/$id_reklame"));
		}
	}


	// ============= Membuat Function ORDER =======

	public function createOrder()
	{
		$config['upload_path'] = './public/image/path_order';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo_order'))
		{
			$photo_order = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo_order = $this->upload->file_name;
		}

		$object = array(
			'no_invoice' => $this->input->post('no_invoice'),
			'id_user' => $this->input->post('id_user'),
			'id_reklame' => $this->input->post('id_reklame'),
			'id_perusahaan' => $this->input->post('id_perusahaan'),
			'description' => $this->input->post('description'),
			'photo_order' => $photo_order,
			'status_order' => $this->input->post('status_order'),
		);

			// return $object;

		$this->db->insert('tbl_order', $object);
		$this->session->set_flashdata('message', "Data berhasil ditambahkan");
	}




	

	public function updateOrder($param = 0)
	{
		$reklame = $this->getOrder($param);

		$config['upload_path'] = dirname($_SERVER["DOCUMENT_ROOT"]).'/public/image/path_order';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = $reklame->photo; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'no_invoice' => $this->input->post('no_invoice'),
			'id_user' => $this->input->post('id_user'),
			'id_reklame' => $this->input->post('id_reklame'),
			'tgl_pesan' => $this->input->post('tgl_pesan'),
			'description' => $this->input->post('description'),
			'photo_order' => $photo_order,
			'status' => $this->input->post('status'),


		);

		$this->db->update('tbl_order', $object, array('no_invoice' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}


	public function updateStatus($param = 0)
	{
		
		$object = array(
			'status' => $this->input->post('status'),
		);

		$this->db->update('tbl_order', $object, array('no_invoice' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function acceptOrder($param = 0)
	{
		$object = array(
			'status_order' => "1",
		);

		$this->db->update('tbl_order', $object, array('no_invoice' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil Accept");
	}

	public function declineOrder($param = 0)
	{
		$object = array(
			'status_order' => "0",
		);

		$this->db->update('tbl_order', $object, array('no_invoice' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil Decline");
	}


	public function deleteOrder($param = 0)
	{
		$Order = $this->getOrder($param);

		if( $Order->photo_order != '')
			@unlink(".pulbic/image/path_order/{$Order->photo_order}");
		$this->db->delete('tbl_order', array('no_invoice' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil dihapus");
	}



	public function getAllOrder($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('tgl_pesan', $this->input->get('q'));

		$this->db->order_by('status_order', 'asc');

		if($type == 'num')
		{
			return $this->db->get('tbl_order')->num_rows();
		} else {
			return $this->db->get('tbl_order', $limit, $offset)->result();
		}
	}

	public function getOrder($param = 0)
	{
		return $this->db->get_where('tbl_order', array('no_invoice' => $param) )->row();
	}

	public function tigatable() {
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('users','tbl_order.id_user=users.userId');
		$this->db->join('reklame','reklame.ID=tbl_order.id_reklame');
		$this->db->where($aktif);
		$query = $this->db->get($akti);
		return $query->result();
	}

	public function duatable($where) {
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('users','users.userId=tbl_order.id_user');
		$this->db->join('reklame','reklame.ID=tbl_order.id_reklame');
		$this->db->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_order.id_perusahaan');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	

	


	// ============= Membuat Function User =======

	public function getAllUser($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('email', $this->input->get('q'));

		$this->db->order_by('role', 'asc');

		if($type == 'num')
		{
			return $this->db->get('users')->num_rows();
		} else {
			return $this->db->get('users', $limit, $offset)->result();
		}
	}

	public function createUser()
	{
		$object = array(
			'role' => $this->input->post('role'),
			'username' => $this->input->post('username'),
			'fullname' => $this->input->post('fullname'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),

		);

			// return $object;

		$this->db->insert('users', $object);
		$this->session->set_flashdata('message', "Register Selesai, silahkan login");
	}

	public function acceptUser($param = 0)
	{
		$object = array(
			'status_aktif' => "1",
		);

		$this->db->update('users', $object, array('userId' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil Accept");
	}

	public function declineUser($param = 0)
	{
		$object = array(
			'status_aktif' => "0",
		);

		$this->db->update('users', $object, array('userId' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil Accept");
	}

// ------------------ PRINT ---------------------
	// Print Reklame
	public function printReklame($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function printReklameById($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function printReklameAll($table)
	{
		return $this->db->get_where($table);
	}
	//  Print Order
	


	public function cariKategoriReklame($where)
	{
		$this ->db->select('*');
		$this->db->from('reklame');
		$this->db->where('jenis_media',$where);
		$query = $this->db->get();
		return $query;
	}	

	// public function cariKategoriReklame($nama, $kategori, $harga)
	// {
	// 	// $where[(
	// 	// 	'name' => $nama,
	// 	// 	'jenis_media' => $kategori,
	// 	// 	'price' => $harga 
	// 	// )];
	// 	$this ->db->select('*');
	// 	$this->db->from('reklame');
	// 	$this->db->where('name',$nama);
	// 	$this->db->where('jenis_media',$kategori);
	// 	$this->db->where('price',$harga);
	// 	$query = $this->db->get();
	// 	return $query;
	// }	


	//get data pemesanan

	public function getDataPemesananJanuari(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '1'" );
		return $query;
	}

	public function getDataPemesananFebruari(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '2'" );
		return $query;
	}

	public function getDataPemesananMaret(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '3'" );
		return $query;
	}

	public function getDataPemesananApril(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '4'" );
		return $query;
	}

	public function getDataPemesananMei(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '5'" );
		return $query;
	}

	public function getDataPemesananJuni(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '6'" );
		return $query;
	}

	public function getDataPemesananJuli(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '7'" );
		return $query;
	}

	public function getDataPemesananAgustus(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '8'" );
		return $query;
	}

	public function getDataPemesananSeptember(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '9'" );
		return $query;
	}

	public function getDataPemesananOktober(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '10'" );
		return $query;
	}
	public function getDataPemesananNovember(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '11'" );
		return $query;
	}
	public function getDataPemesananDesember(){

		$query = $this->db->query("select * from tbl_order WHERE tbl_order.status_order = '1' AND MONTH(tanggal) = '12'" );
		return $query;
	}



	public function getWhereOrder($limit = 10, $offset = 0, $type = 'result', $id_user)
	{
		if( $this->input->get('q') != '')
			$this->db->like('no_invoice', $this->input->get('q'));

		$this->db->order_by('no_invoice', 'desc');

		if($type == 'num')
		{
			return $this->db->get('tbl_order')->num_rows();

		} else {
			
			$this->db->where('id_user', $id_user);
			return $this->db->get('tbl_order', $limit, $offset)->result();
		}
	}

	public function getWherePerusahaan($limit = 10, $offset = 0, $type = 'result', $id_user)
	{
		if( $this->input->get('q') != '')
			$this->db->like('nm_perusahaan', $this->input->get('q'));

		$this->db->order_by('id_perusahaan', 'desc');

		if($type == 'num')
		{
			return $this->db->get('tbl_perusahaan')->num_rows();

		} else {
			
			$this->db->where('id_user', $id_user);
			return $this->db->get('tbl_perusahaan', $limit, $offset)->result();
		}
	}

	// =========== PERUSAHAAN
	public function getPerusahaan($param = 0)
	{
		return $this->db->get_where('tbl_perusahaan', array('id_perusahaan' => $param) )->row();
	}


	public function updatePerusahaan($param = 0)
	{
		$perusahaan = $this->getPerusahaan($param);


		$object = array(
			'nm_perusahaan' => $this->input->post('nm_perusahaan'),
			'jabatan_perusahaan' => $this->input->post('jabatan_perusahaan'),
			'direktur_perusahaan' => $this->input->post('direktur_perusahaan'),
			'kontak_perusahaan' => $this->input->post('kontak_perusahaan'),
			'mobile_perusahaan' => $this->input->post('mobile_perusahaan'),
			'fax_perusahaan' => $this->input->post('fax_perusahaan'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
		);

		$this->db->update('tbl_perusahaan', $object, array('id_perusahaan' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function getAllPerusahaan($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('nm_perusahaan', $this->input->get('q'));

		$this->db->order_by('id_perusahaan', 'desc');

		if($type == 'num')
		{
			return $this->db->get('tbl_perusahaan')->num_rows();
		} else {
			return $this->db->get('tbl_perusahaan', $limit, $offset)->result();
		}
	}


	public function deletePerusahaan($param = 0)
	{
		$perusahaan = $this->getPerusahaan($param);

		
		$this->db->delete('tbl_perusahaan', array('id_perusahaan' => $param));
		

		$this->session->set_flashdata('message', "Data berhasil dihapus");
	}
	public function createPerusahaan()
	{


		$object = array(
			'id_user' => $this->input->post('id_user'),
			'nm_perusahaan' => $this->input->post('nm_perusahaan'),
			'jabatan_perusahaan' => $this->input->post('jabatan_perusahaan'),
			'direktur_perusahaan' => $this->input->post('direktur_perusahaan'),
			'kontak_perusahaan' => $this->input->post('kontak_perusahaan'),
			'mobile_perusahaan' => $this->input->post('mobile_perusahaan'),
			'fax_perusahaan' => $this->input->post('fax_perusahaan'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
		);

			// return $object;

		$this->db->insert('tbl_perusahaan', $object);
		$this->session->set_flashdata('message', "Data berhasil ditambahkan");
	}

	





}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */