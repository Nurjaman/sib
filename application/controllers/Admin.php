<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public $amenities;

	public $page;

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session','form_validation','pagination'));

		$this->load->helper(array('menus','text','url','cias_helper'));

		if($this->session->userdata("role")!="Admin" && $this->session->userdata("role")!="Pemilik Media") {
			redirect(site_url());
		}

		$this->amenities = array('Full Service','Pantau CCTV','Free Pasang','Free Design','Lokasi Ramai');

		$this->load->model('madmin');
		$this->load->model('M_User');

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$dataJanuari = $this->madmin->getDataPemesananJanuari()->result();
		$resultJanuari = count($dataJanuari);
		// ---
		$dataFebruari = $this->madmin->getDataPemesananFebruari()->result();
		$resultFebruari = count($dataFebruari);
		// ---
		$dataMaret = $this->madmin->getDataPemesananMaret()->result();
		$resultMaret = count($dataMaret);
		// ---
		$dataApril = $this->madmin->getDataPemesananApril()->result();
		$resultApril = count($dataApril);
		// ---
		$dataMei = $this->madmin->getDataPemesananMei()->result();
		$resultMei = count($dataMei);
		// ----
		$dataJuni = $this->madmin->getDataPemesananJuni()->result();
		$resultJuni = count($dataJuni);
		// -----
		$dataJuli = $this->madmin->getDataPemesananJuli()->result();
		$resultJuli = count($dataJuli);
		// -----
		$dataAgustus = $this->madmin->getDataPemesananAgustus()->result();
		$resultAgustus = count($dataAgustus);
		// ----
		$dataSeptember = $this->madmin->getDataPemesananSeptember()->result();
		$resultSeptember= count($dataSeptember);
		// ----
		$dataOktober = $this->madmin->getDataPemesananOktober()->result();
		$resultOktober = count($dataOktober);
		// ----
		$dataNovember = $this->madmin->getDataPemesananNovember()->result();
		$resultNovember = count($dataNovember);
		// ----
		$dataDesember = $this->madmin->getDataPemesananDesember()->result();
		$resultDesember = count($dataDesember);


		$this->data = array(
			'title' => "Home Administrator",
			'dataJanuari' => $resultJanuari,
			'dataFebruari' => $resultFebruari,
			'dataMaret' => $resultMaret,
			'dataApril' => $resultApril,
			'dataMei' => $resultMei,
			'dataJuni' => $resultJuni,
			'dataJuli' => $resultJuli,
			'dataAgustus' => $resultAgustus,
			'dataSeptember' => $resultSeptember,
			'dataOktober' => $resultOktober,
			'dataNovember' => $resultNovember,
			'dataDesember' => $resultDesember,
		);	

		$this->load->view('admin/main-admin', $this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}

	public function addreklame()
	{	
		$this->data['title'] = "Tambah Reklame";

		$this->form_validation->set_rules('id_user', 'User ID', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('price', 'Harga', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');

		$this->form_validation->set_rules('jenis_media', 'Jenis_Media', 'trim|required');
		$this->form_validation->set_rules('orientasi', 'Orientasi', 'trim|required');
		$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
		$this->form_validation->set_rules('lighting', 'Lighting', 'trim|required');
		$this->form_validation->set_rules('position', 'position', 'trim|required');

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required');
		
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createReklame();

			redirect(current_url());
		}

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = '-6.8736073,107.5564327';
		$config['zoom'] = '12';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-6.8736073,107.5564327';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('admin/add-reklame', $this->data);
	}

	public function reklame()
	{

		$id_user = $this->session->userdata('userId');

		$config['base_url'] = site_url("admin/reklame?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllReklame(null, null, 'num', $id_user);
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = "&larr; Pertama";
		$config['first_tag_open'] = '<li class="">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = "Terakhir &raquo";
		$config['last_tag_open'] = '<li class="">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = "Selanjutnya &rarr;";
		$config['next_tag_open'] = '<li class="">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = "&larr; Sebelumnya"; 
		$config['prev_tag_open'] = '<li class="">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="">';
		$config['num_tag_close'] = '</li>'; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		

		$this->data = array(
			'title' => "Data Reklame",
			'reklame' => $this->madmin->getAllreklame($config['per_page'], $this->input->get('page'), 'result', $id_user)
		);

		$this->load->view('admin/data-reklame', $this->data);
	}

	public function updatereklame($param = 0)
	{
		$this->data['title'] = "Update Reklame";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('price', 'Harga', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		$this->form_validation->set_rules('jenis_media', 'Jenis_Media', 'trim|required');
		$this->form_validation->set_rules('orientasi', 'Orientasi', 'trim|required');
		$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
		$this->form_validation->set_rules('lighting', 'Lighting', 'trim|required');
		$this->form_validation->set_rules('position', 'position', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateReklame($param);
			
			redirect(current_url());
		}

		$this->data['reklame'] = $this->madmin->getReklame($param);

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = $this->data['reklame']->latitude.','.$this->data['reklame']->longitude;
		$config['zoom'] = '14';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $this->data['reklame']->latitude.','.$this->data['reklame']->longitude;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('admin/update-reklame', $this->data);
	}

	public function deletekategory($param = 0)
	{
		$this->madmin->deletekategory($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Kategory telah dihapus ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/kategorireklame');
	}

	public function deletereklame($param = 0)
	{
		$this->madmin->deleteReklame($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Reklame telah dihapus ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/reklame');
	}


	public function tambah_foto($id_reklame){
		$this->data = array(
			'title' => "Tambah Foto",
		);
		$this->data['id_reklame'] = $id_reklame;
		$this->data['reklame'] = $this->madmin->select_reklame_id($id_reklame);
		$this->data['foto_reklame'] = $this->madmin->select_foto_id($id_reklame);
		$this->load->view('admin/tambah_foto', $this->data);
	}

	public function proses_tambah_gambar(){
		$id_reklame = html_escape($this->input->post('id_reklame', TRUE));
		$berhasil = $this->madmin->proses_tambah_gambar();
		if($berhasil){
			//Sukses daftar
			$this->session->set_flashdata('pesan',"
				<script type='text/javascript'>
				swal({
					title: 'Sukses',
					text: 'Anda berhasil menambahkan gambar ! ',
					icon: 'success',
					confirmButtonText: 'OK'
					})
					</script>");
			redirect(base_url("admin/tambah_foto/$id_reklame"));
		}else{
			$this->session->set_flashdata('pesan','Gagal memasukan data! mohon coba lagi.');
			redirect(base_url("admin/tambah_foto/$id_reklame"));
		}
		
	}

	public function hapus_gambar($id){
		$id_reklame = $this->uri->segment(4);
		$this->db->WHERE('id_foto',$id)
		->DELETE('foto_reklame');
		$this->session->set_flashdata('pesan',"
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Gambar telah dihapus ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect(base_url("admin/tambah_foto/$id_reklame"));
	}

	public function hapus_semua_gambar($id){
		$this->db->WHERE('id_reklame',$id)
		->DELETE('foto_reklame');
		
		$this->session->set_flashdata('pesan',"
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Semua gambar ini telah dihapus ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");
		redirect(base_url("admin/tambah_foto/$id"));
	}




	public function account()
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->madmin->getAccount()
		);	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		if ($this->form_validation->run() == TRUE) 
		{
			$this->madmin->setAccount();
			
			redirect(current_url());
		}
		$this->load->view('account', $this->data);
	}

	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		$user = $this->madmin->getAccount();

		if(password_verify($this->input->post('old_pass'), $user->password))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}


	/* Data Master 
	-----------------------------------------------------
	*/
	// Order



	public function addOrder()
	{	
		$this->data['title'] = "Tambah Order";

		$this->form_validation->set_rules('no_invoice', 'Nomer Inovice', 'trim|required');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
		$this->form_validation->set_rules('id_reklame', 'id_reklame', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('status_order', 'Deskripsi', 'trim|required');
		
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createOrder();

			redirect(current_url());
		}
		$this->data['invoice']=$this->madmin->get_no_invoice();
		$this->load->view('admin/add-order', $this->data);

	}


	public function Order()
	{
		$config['base_url'] = site_url("admin/Order?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllOrder(null, null, 'num');
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = "&larr; Pertama";
		$config['first_tag_open'] = '<li class="">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = "Terakhir &raquo";
		$config['last_tag_open'] = '<li class="">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = "Selanjutnya &rarr;";
		$config['next_tag_open'] = '<li class="">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = "&larr; Sebelumnya"; 
		$config['prev_tag_open'] = '<li class="">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="">';
		$config['num_tag_close'] = '</li>'; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Data Order",
			'order' => $this->madmin->getAllOrder($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('admin/data-order', $this->data);
	}



	public function updateOrder($param)
	{
		$this->data['title'] = "Update Order";

		$this->form_validation->set_rules('no_invoice', 'no_invoice', 'trim|required');
		$this->form_validation->set_rules('tgl_pesan', 'tgl_pesan', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateOrder($param);

			redirect(current_url());
		}

		  //active record dengan nama edi
		$where = array('no_invoice' => $param);

		$this->data['reklame'] = $this->madmin->duatable($where,'tbl_order');
		$this->load->view('admin/detail-order1', $this->data);
	}

	
	
	public function updateUser($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun"
		);	

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateUser($param);
			// echo $object;

			redirect(current_url());
		}

		$this->data['user'] = $this->madmin->getUser($param);
		$this->load->view('account', $this->data);
	}

	/* ------------------------------------------
	------------- End Order ------------------*/

	/* ------------------------------------------
	------------- User ------------------*/


	public function User()
	{
		$config['base_url'] = site_url("admin/User?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllUser(null, null, 'num');
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = "&larr; Pertama";
		$config['first_tag_open'] = '<li class="">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = "Terakhir &raquo";
		$config['last_tag_open'] = '<li class="">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = "Selanjutnya &rarr;";
		$config['next_tag_open'] = '<li class="">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = "&larr; Sebelumnya"; 
		$config['prev_tag_open'] = '<li class="">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="">';
		$config['num_tag_close'] = '</li>'; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Data User",
			'reklame' => $this->madmin->getAllUser($config['per_page'], $this->input->get('page'), 'result')
		);


		$this->load->view('admin/data-user', $this->data);
	}


	public function addUser()
	{	
		$this->data['title'] = "Tambah User";

		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('role', 'role', 'trim|required');
		
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createUser();

			redirect(current_url());
		}
		$this->load->view('admin/add-user', $this->data);

	}


	public function acceptUser($param = 0)
	{
		$this->madmin->acceptUser($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'User telah Di Accept ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/User');
	}

	public function declineUser($param = 0)
	{
		$this->madmin->declineUser($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'User telah Di Decline ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/User');
	}


	// Print Reklame
	// =================================

	public function printReklame($id)
	{
		$where = array('ID'=> $id);
		$data['reklame'] = $this->madmin->printReklame($where,'reklame')->result();
		// print_r($data);

		$this->load->view('cetak/cetakreklame.php',$data);
	}
	
	public function printReklameById($id)
	{
		$where = array('id_user'=> $id);
		$data['reklame'] = $this->madmin->printReklameById($where,'reklame')->result();
		// print_r($data);

		$this->load->view('cetak/cetakreklame.php',$data);
	}

	public function printReklameAll()
	{
		// $where = array('id_user'=> $id);
		$data['reklame'] = $this->madmin->printReklameAll('reklame')->result();
		// print_r($data);

		$this->load->view('cetak/cetakreklame.php',$data);
	}

	// Print Order
	// =================================
	public function printOrder($id)
	{
		$where = array('no_invoice'=> $id);
		$data['reklame'] = $this->madmin->printReklame($where,'tbl_order')->result();
		// print_r($data);

		$this->load->view('cetak/cetakorder.php',$data);
	}

	public function printOrderById($id)
	{
		$where = array('no_invoice'=> $id);
		$data['reklame'] = $this->madmin->printReklameById($where,'tbl_order')->result();
		// print_r($data);

		$this->load->view('cetak/cetakorder.php',$data);
	}

	public function printOrderAll()
	{
		// $where = array('id_user'=> $id);
		$data['reklame'] = $this->madmin->printReklameAll('tbl_order')->result();
		// print_r($data);

		$this->load->view('cetak/cetakorder.php',$data);
	}


	// Print User
	// =================================

	public function printUser($id)
	{
		$where = array('userId'=> $id);
		$data['reklame'] = $this->madmin->printReklame($where,'users')->result();
		// print_r($data);

		$this->load->view('cetak/cetakuser.php',$data);
	}

	public function printUserAll()
	{
		// $where = array('id_user'=> $id);
		$data['reklame'] = $this->madmin->printReklameAll('users')->result();
		// print_r($data);

		$this->load->view('cetak/cetakuser.php',$data);
	}
	public function kategorireklame()
	{
		$config['base_url'] = site_url("admin/kategorireklame?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllkategori(null, null, 'num');
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = "&larr; Pertama";
		$config['first_tag_open'] = '<li class="">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = "Terakhir &raquo";
		$config['last_tag_open'] = '<li class="">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = "Selanjutnya &rarr;";
		$config['next_tag_open'] = '<li class="">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = "&larr; Sebelumnya"; 
		$config['prev_tag_open'] = '<li class="">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="">';
		$config['num_tag_close'] = '</li>'; 
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		

		$this->data = array(
			'title' => "Data Kategori Reklame",
			'kategori' => $this->madmin->getAllkategori($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('admin/data-kategori', $this->data);
	}

	public function addKategori()
	{	
		$this->data['title'] = "Tambah Kategori";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createkategori();

			redirect(current_url());
		}

		$this->load->view('admin/add-kategori', $this->data);

	}




}
/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */