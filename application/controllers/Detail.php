<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session','form_validation','pagination'));

		$this->load->helper(array('menus','text','url'));

		

		$this->amenities = array('Full Service','Pantau CCTV','Free Pasang','Free Design','Lokasi Ramai');

		$this->load->model('madmin');

		$this->page = $this->input->get('page');
	}
	
	
	public function marker($id){
		$this->data['title'] = "SISTEM INFORMASI SIB";
		$this->data['reklame'] = $this->madmin->getReklame($id);

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "500px";
		// $config['map_type'] = 'STREET';
		// $config['streetViewPovHeading'] = 90;
		$config['center'] = $this->data['reklame']->latitude.','.$this->data['reklame']->longitude;
		$config['zoom'] = '14';
		$config['map_height'] = '500px;';
		
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $this->data['reklame']->latitude.','.$this->data['reklame']->longitude;
		$marker['draggable'] = false;
		//$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();
 		$this->data['invoice']=$this->madmin->get_no_invoice();


		$this->load->view('detail_marker', $this->data);
	}	


    //Membuat Function ORDER
    // ============================

	public function addorder()
	{	

		$this->data['title'] = "Tambah Order";

		$this->form_validation->set_rules('no_invoice', 'no_invoice', 'trim|required');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
		$this->form_validation->set_rules('id_reklame', 'id_reklame', 'trim|required');
		$this->form_validation->set_rules('tgl_pesan', 'tgl_pesan', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
	
		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createOrder();

			// echo $object;

			redirect(current_url());
		}


		redirect('Welcome');
	}


	public function acceptOrder($param = 0)
	{
		$this->madmin->acceptOrder($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Reklame telah Di Accept ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/order');
	}

	public function declineOrder($param = 0)
	{
		$this->madmin->declineOrder($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Reklame telah Di Decline ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/order');
	}



	public function deleteOrder($param = 0)
	{
		$this->madmin->deleteOrder($param);

		$this->session->set_flashdata('pesan',"	
			<script type='text/javascript'>
			swal({
				title: 'Sukses',
				text: 'Reklame telah dihapus ! ',
				icon: 'success',
				confirmButtonText: 'OK'
				})
				</script>");

		redirect('admin/order');
	}

    // ============================
}