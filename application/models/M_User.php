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

	public function check_login ($table, $where){
		// $this->db->select('*');
		// $this->db->from($table);
		// $this->db->where($field1);
		// $this->db->where($field2);
		// $this->db->limit(1);
		// $query = $this->db->get();
		// if($query->num_rows() == 0){
		// 	return FALSE;
		// }else{
		// 	return $query->result();
		// }
		return $this->db->get_where($table,$where);
	}
	public function getUser($param = 0)
	{
		return $this->db->get_where('users', array('userId' => $param) )->row();
	}


	public function updateUser($param = 0)
	{
		$user = $this->getUser($param);
		
		// $config['upload_path'] = dirname($_SERVER["DOCUMENT_ROOT"]).'/public/image/data_profile';

		if ($this->input->post('photo_profile')){
			$config['upload_path'] = './public/image/data_profile';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_width']  = 1024*3;
			$config['max_height']  = 768*3;
			
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('photo_profile'))
			{
				$photo_profile = ""; 
				$this->session->set_flashdata('message', $this->upload->display_errors());
			} else{
				$photo_profile = $this->upload->file_name;
			}
		}

		if ($this->input->post('photo_sppkp')){
			$config2['upload_path'] = './public/image/foto_sppkp';
			$config2['allowed_types'] = 'gif|jpg|png';
			$config2['max_width']  = 1024*3;
			$config2['max_height']  = 768*3;
			
			$this->upload->initialize($config2);

			if ( ! $this->upload->do_upload('photo_sppkp'))
			{
				$photo_sppkp = ""; 
				$this->session->set_flashdata('message', $this->upload->display_errors());
			} else{
				$photo_sppkp = $this->upload->file_name;
			}
		}else{
			echo "Error 2";
		}

		// if ( ! $this->upload->do_upload('photo_sppkp'))
		// {
		// 	$photo_sppkp = $user->photo_sppkp; 
		// 	$this->session->set_flashdata('message', $this->upload->display_errors());
		// } else{
		// 	$photo_sppkp = $this->upload->photo_sppkp;
		// }	

		// if ( ! $this->upload->do_upload('photo_npwp'))
		// {
		// 	$photo_npwp = $user->photo_npwp; 
		// 	$this->session->set_flashdata('message', $this->upload->display_errors());
		// } else{
		// 	$photo_npwp = $this->upload->photo_npwp;
		// }	

		// if ( ! $this->upload->do_upload('photo_siup'))
		// {
		// 	$photo_siup = $user->photo_siup; 
		// 	$this->session->set_flashdata('message', $this->upload->display_errors());
		// } else{
		// 	$photo_siup = $this->upload->photo_siup;
		// }	

		if($photo_profile == null || $photo_sppkp == null){
			if($photo_profile == null){

			}
			$object = array(
				'fullname' => $this->input->post('fullname'),
				'mobile' => $this->input->post('mobile'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'kota' => $this->input->post('kota'),
				'kode_pos' => $this->input->post('kode_pos'),
				'alamat' => $this->input->post('alamat'),
				//'password' => $this->input->post('password'),
				// 'photo_profile' => $photo_profile,
				// 'photo_npwp' => $photo_npwp,
				// 'photo_sppkp' => $photo_sppkp,
				// 'photo_siup' => $photo_siup,

			);
		}else{
			$object = array(
				'fullname' => $this->input->post('fullname'),
				'mobile' => $this->input->post('mobile'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'kota' => $this->input->post('kota'),
				'kode_pos' => $this->input->post('kode_pos'),
				'alamat' => $this->input->post('alamat'),
				//'password' => $this->input->post('password'),
				'photo_profile' => $photo_profile,
				// 'photo_npwp' => $photo_npwp,
				'photo_sppkp' => $photo_sppkp,
				// 'photo_siup' => $photo_siup,

			);
		}
		echo "Coba";
		$this->db->update('users', $object, array('userId' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}



	public function updateFotoUser($param = 0)
	{
		$user = $this->getUser($param);
		
		$config['upload_path'] = './public/image/foto_user';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo_profile'))
		{
			$photo_profile = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo_profile = $this->upload->file_name;
		}

		$object = array(
			'photo_profile' => $photo_profile,
		);
		

		$this->db->update('users', $object, array('userId' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function updateFotoNpwp($param = 0)
	{
		$user = $this->getUser($param);
		
		$config['upload_path'] = './public/image/foto_npwp';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo_npwp'))
		{
			$photo_npwp = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo_npwp = $this->upload->file_name;
		}

		$object = array(
			'photo_npwp' => $photo_npwp,
		);
		

		$this->db->update('users', $object, array('userId' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function updateFotoSppkp($param = 0)
	{
		$user = $this->getUser($param);
		
		$config['upload_path'] = './public/image/foto_sppkp';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo_sppkp'))
		{
			$photo_sppkp = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo_sppkp = $this->upload->file_name;
		}

		$object = array(
			'photo_sppkp' => $photo_sppkp,
		);
		

		$this->db->update('users', $object, array('userId' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function updateFotoSiup($param = 0)
	{
		$user = $this->getUser($param);
		
		$config['upload_path'] = './public/image/foto_siup';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo_siup'))
		{
			$photo_siup = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo_siup = $this->upload->file_name;
		}

		$object = array(
			'photo_siup' => $photo_siup,
		);
		

		$this->db->update('users', $object, array('userId' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}





	public function getAccount()
	{
		$this->db->select('*');
		$this->db->from('users');
		// $this->db->join('users','users.userId=tbl_order.id_user');
		// $this->db->join('reklame','reklame.ID=tbl_order.id_reklame');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
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



	public function createRegister()
	{
		
		$object = array(
			'role' => $this->input->post('role'),
			'fullname' => $this->input->post('fullname'),
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


	public function update_reset_key($email,$reset_key)
	{
		$this->db->where('email', $email);
		$data = array('reset_password'=>$reset_key);
		$this->db->update('users', $data);
		if($this->db->affected_rows()>0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function reset_password($reset_key, $password)
	{
		$this->db->where('reset_password', $reset_key);
		$data = array('password' => $password);
		$this->db->update('users', $data);
		return ($this->db->affected_rows()>0 )? TRUE:FALSE;
	}


	public function check_reset_key($reset_key)
	{
		$this->db->where('reset_password', $reset_key);
		$this->db->from('users');
		return $this->db->count_all_results();
	}



}

/* End of file Madmin.php */
/* Location: ./application/models/M_User.php */