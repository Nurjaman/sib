<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session','form_validation','pagination'));

		$this->load->helper(array('menus','text','url'));

		

		$this->amenities = array('Full Service','Pantau CCTV','Free Pasang','Free Design','Lokasi Ramai');

		$this->load->model('M_User');
		$this->load->model('Madmin');

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		
	}
	public function addPerusahaan()
	{	
		$this->data['title'] = "Tambah Perusahaan";

		$this->form_validation->set_rules('id_user', 'id', 'trim|required');
		$this->form_validation->set_rules('nm_perusahaan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jabatan_perusahaan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('direktur_perusahaan', 'Nama Direktur', 'trim|required');
		$this->form_validation->set_rules('kontak_perusahaan', 'Nama Kontak Perusahaan', 'trim|required');
		$this->form_validation->set_rules('mobile_perusahaan', 'Nomor Perusahaan', 'trim|required');

		$this->form_validation->set_rules('fax_perusahaan', 'Fax', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Orientasi', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->M_User->createPerusahaan();

			redirect(current_url());
		}

		$this->load->view('buyer/add-perusahaan', $this->data);
	}





	public function auth()
	{

		$userLogin = $this->getUserLogin($this->input->post('identity'));

		if( $userLogin ) 
		{
			if ( password_verify($this->input->post('password'), $userLogin->password) ) 
			{
				$user_session = array(
					// 'admin_login' => TRUE,
					'userId' => $userLogin->userId,
					'nama' => $userLogin->fullname,
					'email' => $userLogin->email,
					// 'user' => $userLogin,
					'role' => $userLogin->role,

				);	

				$this->session->set_userdata( $user_session );
				if($this->session->userdata("role") == "Admin"){
					redirect(base_url('admin'));
				}elseif($this->session->userdata("role") == "Penyewa"){
					redirect(base_url('buyer'));
				}elseif($this->session->userdata("role") == "Pemilik Media"){
					redirect(base_url('seller'));
				}
			} else {
				$this->session->set_flashdata('message', 'Kombinasi Username/E-Mail dan Password tidak cocok.');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('message', 'Mohon Masukkan Username/E-Mail dan Password.');
			redirect(base_url());
		}



	}

	public function getUserLogin($identity = '')
	{
		if (filter_var($identity, FILTER_VALIDATE_EMAIL)) 
		{
			return $this->db->get_where('users', array('email' => $identity, 'status_aktif'=>'1'))->row();
		} else {
			return $this->db->get_where('users', array('username' => $identity,'status_aktif'=>'1'))->row();
		}
	}

	public function signout()
	{
		$this->session->set_flashdata('message', 'Anda berhasil keluar.');
		$this->session->sess_destroy();

		redirect(base_url());
	}

	public function register()
	{	

		$this->data['title'] = "Register";

		$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[retype_password]');
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('role', 'role', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->M_User->createRegister();

			// echo $object;

			redirect(current_url());
		}


		redirect('Welcome');
	}

	


	public function updateUser($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getRegister()
		);	

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[4]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');

		if ($this->form_validation->run() == TRUE)
		{
			$this->M_User->updateUser($param);
			// echo $object;

			redirect(current_url());
		}

		  //active record dengan nama edi
		$where = array('userId' => $param);

		$this->data['user'] = $this->Madmin->getAllUser($where,'users');
		$this->load->view('account', $this->data);
	}


	public function updateUser1($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getAllRegister()
		);	

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		// $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		// $this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		// $this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[4]');
		// $this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');

		if ($this->form_validation->run() == TRUE)
		{
			$this->M_User->updateUser($param);
			// echo $object;

			redirect(current_url());
		}

		  //active record dengan nama edi
		$where = array('userId' => $param);
		$this->data['user'] = $this->Madmin->getAllUser($where,'users');

		// $where1 = array('userId' => $param);
		// $this->data['perusahaan'] = $this->Madmin->getAllPerusahaan($where1,'tbl_perusahaan');




		$this->load->view('account1', $this->data);
	}





	public function UpadateFotoUser($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getAllRegister()
		);	

		
		$this->M_User->updateFotoUser($param);

		$where = array('userId' => $param);
		$this->data['user'] = $this->Madmin->getAllUser($where,'users');

		$this->load->view('account1', $this->data);
	}

	public function UpadateFotoNpwp($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getAllRegister()
		);	

		
		$this->M_User->updateFotoNpwp($param);

		$where = array('userId' => $param);
		$this->data['user'] = $this->Madmin->getAllUser($where,'users');

		$this->load->view('account1', $this->data);
	}

	public function UpadateFotoSppkp($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getAllRegister()
		);	

		
		$this->M_User->updateFotoSppkp($param);

		$where = array('userId' => $param);
		$this->data['user'] = $this->Madmin->getAllUser($where,'users');

		$this->load->view('account1', $this->data);
	}

	public function UpadateFotoSiup($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getAllRegister()
		);	

		
		$this->M_User->updateFotoSiup($param);

		$where = array('userId' => $param);
		$this->data['user'] = $this->Madmin->getAllUser($where,'users');

		$this->load->view('account1', $this->data);
	}



	public function updateProfile($param = 0)
	{

		$this->data['title'] = "Update profile";


		$config['upload_path'] = dirname($_SERVER["DOCUMENT_ROOT"]).'/public/image/data_profile';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);
		$data["img"] = "";

		for ($i=1; $i <= 2 ; $i++) { 
            if(!empty($_FILES["photo_profile".$i]["name"])){ // Mengecek apakah form input file ada 
                $this->load->library("upload", $config); // Meload library upload
                if($this->upload->do_upload("gambar".$i)){ // Melakukan upload file
                    $dt_upload = array('gambar' => $_FILES["gambar".$i]['name'], ); // data yang akan dimasukkan ke database
                    $this->M_upload->insert($dt_upload); // input data gambar ke database
                    $data["img"] = $this->M_User->getUser(); // mengambil data gambar dari database
                    $data["msg"] = "Gambar berhasil dipuload";
                }else{
                	$data["img"] = $this->M_User->getUser();
                	$data["msg"] = "Gambar gagal dipuload";
                }
            }
        }

		// if ( ! $this->upload->do_upload('photo_profile'))
		// {
		// 	$photo_profile = ""; 
		// 	$this->session->set_flashdata('message', $this->upload->display_errors());
		// } else{
		// 	$photo_profile = $this->upload->file_name;
		// }


        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
		// $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		// $this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		// $this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		// $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
        	$this->M_User->updateUser($param);
        	redirect(current_url());


        	$this->session->set_flashdata('pesan',"	
        		<script type='text/javascript'>
        		swal({
        			title: 'Sukses',
        			text: 'Profil telah berhasil di rubah ! ',
        			icon: 'success',
        			confirmButtonText: 'OK'
        			})
        			</script>");



        }

        $this->data['user'] = $this->M_User->getUser($param);

		// $this->M_User->updateUser($param);


        $this->load->view('account1', $this->data);
		// $this->load->view('account1');

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

    public function reset_password_email()
    {
    	$this->load->view('reset_password_email1');
    }


    public function email_reset_password_validation(){
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
    	if($this->form_validation->run()){

    		$email = $this->input->post('email');
    		$reset_key =  random_string('alnum', 50);

    		if($this->M_User->update_reset_key($email,$reset_key))
    		{

    			$this->load->library('email');
    			$config = array();
    			$config['charset'] = 'utf-8';
    			$config['useragent'] = 'Codeigniter';
    			$config['protocol']= "smtp";
    			$config['mailtype']= "html";
				$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
				$config['smtp_port']= "465";
				$config['smtp_timeout']= "5";
				$config['smtp_user']= "nurzaman089672255644@gmail.com"; // isi dengan email kamu
				$config['smtp_pass']= "nurjaman123"; // isi dengan password kamu
				$config['crlf']="\r\n"; 
				$config['newline']="\r\n"; 
				$config['wordwrap'] = TRUE;
				//memanggil library email dan set konfigurasi untuk pengiriman email

				$this->email->initialize($config);
				//konfigurasi pengiriman
				$this->email->from($config['smtp_user']);
				$this->email->to($this->input->post('email'));
				$this->email->subject("Reset your password");

				$message = "<p>Anda melakukan permintaan reset password</p>";
				$message .= "<a href='".site_url('user/reset_password/'.$reset_key)."'>klik reset password</a>";
				$this->email->message($message);
				
				if($this->email->send())
				{
					$this->load->view('reset_password_sukses1');
					// echo "silahkan cek email <b>".$this->input->post('email').'</b> untuk melakukan reset password';
				}else
				{
					echo "Berhasil melakukan registrasi, gagal mengirim verifikasi email";
				}
				


			}else {
				die("Email yang anda masukan belum terdaftar");
			}
		} else{
			$this->load->view('reset_password1');
			// redirect('Welcome');

		}
	}

	public function reset_password()
	{
		$reset_key = $this->uri->segment(3);
		
		if(!$reset_key){
			die('Jangan Dihapus');
		}

		if($this->M_User->check_reset_key($reset_key) == 1)
		{
			$this->load->view('reset_password1');
		} else{
			die("reset key salah");
		}
	}

	public function reset_password_validation(){
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[retype_password]');
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'required|min_length[6]|matches[password]');

		if($this->form_validation->run())
		{

			$reset_key = $this->input->post('reset_key');
			$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

			if($this->M_User->reset_password($reset_key, $password)){
				// echo "Password anda telah berhasil diubah";
				redirect('welcome');
			}else{
				echo "error";
			}

		}else{
			$this->load->view('reset_password1');
		} 
	}

	public function deleteUser($param = 0)
	{
		$this->Madmin->deleteUser($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Users ini telah dihapus ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				}) 
				</script>");

		redirect('admin/user');
	}

	//change password
		public function changePassword($param)
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->M_User->getRegister()
		);	

		
		$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[6]|matches[retype_password]');
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'required|min_length[6]|matches[new_password]');

		//$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');

		if ($this->form_validation->run() == TRUE)
		{
			$this->M_User->changePassword($param);
			// echo $object;

			redirect(current_url());
		}

		  //active record dengan nama edi
		$where = array('userId' => $param);

		$this->data['user'] = $this->Madmin->getAllUser($where,'users');
		$this->load->view('account1', $this->data);
	}




}



/* End of file User.php */
/* Location: ./application/controllers/User.php */