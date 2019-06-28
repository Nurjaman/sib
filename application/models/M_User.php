<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('upload','session'));
	}

	// ============= Membuat Function Register =======
	public function getAllRegister($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('email', $this->input->get('q'));

		$this->db->order_by('userId', 'asc');

		if($type == 'num')
		{
			return $this->db->get('users')->num_rows();
		} else {
			return $this->db->get('users', $limit, $offset)->result();
		}
	}

	public function check_login ($table, $field1, $field2){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1);
		$this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 0){
			return FALSE;
		}else{
			return $query->result();
		}
	}



	public function createRegister()
	{
		
		$object = array(
			'role' => $this->input->post('role'),
			'username' => $this->input->post('username'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),

		);

			// return $object;

		$this->db->insert('users', $object);
		$this->session->set_flashdata('message', "Register Selesai, silahkan login");
	}

	public function getRegister($param = 0)
	{

		return $this->db->get_where('users', array('userId' => $param) )->row();
	}


}

/* End of file Madmin.php */
/* Location: ./application/models/M_User.php */