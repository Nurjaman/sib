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

		$this->load->model('M_User','Madmin');

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		
	}
	public function auth()
	{

		$username = $this->input->post('identity',TRUE);
		$password = password_verify($this->input->post('password'), TRUE);

		$checking = $this->Madmin->check_login('users', array('email' => $username), array('password' => $password));


		// $userLogin = $this->getUserLogin($this->input->post('identity'));

		if( $checking != FALSE ) 
		{
			foreach ($checking as $userLogin) {
				# code...
			
			// if ( password_verify($this->input->post('password'), $userLogin->password) ) 
			// {
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
			}
		} else {
			$this->session->set_flashdata('message', 'Kombinasi Username/E-Mail dan Password tidak cocok.');
			redirect(base_url());
		}
		// } else {
		// 	$this->session->set_flashdata('message', 'Mohon Masukkan Username/E-Mail dan Password.');
		// 	redirect(base_url());
		// }
	}

	public function getUserLogin($identity = '')
	{
		if (filter_var($identity, FILTER_VALIDATE_EMAIL)) 
		{
			return $this->db->get_where('users', array('email' => $identity))->row();
		} else {
			return $this->db->get_where('users', array('username' => $identity))->row();
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

		$this->data['title'] = "Tambah Order";

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('role', 'role', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->M_User->createRegister();

			// echo $object;

			redirect(current_url());
		}


		redirect('Welcome');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */