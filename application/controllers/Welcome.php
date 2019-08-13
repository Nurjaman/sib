<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session'));

		$this->load->model('madmin');
	}

	public function index()
	{
		$this->data['title'] = "SISTEM INFORMASI SIB";
		$config['center'] = '-6.8736073,107.5564327';
		// $config['trafficOverlay'] = TRUE; // mengetahui trafic di sekitar lokasi
		$config['zoom'] = 'auto';//Makin kecil makin jauh.
		$config['styles'] = array(
			array(
				"name"=>"No Businesses", 
				"definition"=> array(
					array(
						"featureType"=>"poi", 
						"elementType" => 
						"business", 
						"stylers"=> array(
							array(
								"visibility"=>"off"
							)
						)
					)
				)
			)
		);
		$this->googlemaps->initialize($config);
		foreach($this->searchQuery() as $key => $value) :

			if($value->jenis_media=="Billboard") : 
				$icon = "billCon.png";
			elseif ($value->jenis_media=="Megatron"):
				$icon = "MegCon.png";
			else : 
				$icon = "NeoCon.png"; 
				endif;

			$marker = array();
			$marker['position'] = "{$value->latitude}, {$value->longitude}";

			$marker['animation'] = 'DROP';
			$marker['infowindow_content'] = '<div class="media" style="width:400px;">';
			$marker['infowindow_content'] .= '<div class="media-left">';
			$marker['infowindow_content'] .= '<img src="'.base_url().'public/image/'.$value->photo.'" class="media-object" style="width:150px">';
			$marker['infowindow_content'] .= '</div>';
			$marker['infowindow_content'] .= '<div class="media-body" style="margin-left:10px;">';
			$marker['infowindow_content'] .= '<h6 class="media-heading">'.$value->name.'</h6>';
			$marker['infowindow_content'] .= '<p style="margin:0px; font-size:14px;">Harga : <strong>Rp. '.number_format($value->price).',-/Bulan</strong></p>';
			$marker['infowindow_content'] .= '<p style="margin:0px; font-size:12px;">Deskripsi : '.$value->description.' </p>';
			$marker['infowindow_content'] .= '<a href="'.base_url().'detail/marker/'.$value->ID.'" style=" font-size:12px;" target="_blank"  >Read more  >></a>';
			$marker['infowindow_content'] .= '</div>';
			$marker['infowindow_content'] .= '</div>';
			$marker['icon'] = base_url("public/icon/").$icon;
				

	
		$this->googlemaps->add_marker($marker);
	endforeach;

	$this->googlemaps->initialize($config);

	$this->data['map'] = $this->googlemaps->create_map();

		//$this->load->view('main-index', $this->data);
	$this->load->view('home', $this->data);
}

public function searchQuery()
{
	$this->db->select('reklame.*,  categories.name as category');
	$this->db->join('reklamecategories', 'reklame.ID = reklameCategories.category_id' ,'left');
	$this->db->join('categories', 'reklameCategories.category_id = categories.category_id','left' );
	switch ($this->input->get('price')) 
	{
		case '<25000000':
		$this->db->where('reklame.price <', 25000000);
		break;
		case '25000000-50000000':
		$this->db->where('reklame.price >=', 25000000);
		$this->db->where('reklame.price <=', 50000000);
		break;
		case '50000000-100000000':
		$this->db->where('reklame.price >=', 50000000);
		$this->db->where('reklame.price <=', 100000000);
		break;
		case '100000000':
		$this->db->where('reklame.price >', 100000000);
		break;
	}

		// if( is_array(@$this->input->post('categories')) )
		// 	$this->db->where_in('reklameCategories.category_id', $this->input->post('categories'));

	if(is_array(@$this->input->get('categories')))
		$this->db->where_in('reklame.jenis_media',$this->input->get('categories'));

	$this->db->group_by('reklame.ID');

	if($this->input->get('q') != '')
		$this->db->like('reklame.address', $this->input->get('q'));

	$this->db->where('reklame.latitude !=', NULL)
	->where('reklame.longitude !=', NULL);

	return $this->db->get("reklame")->result();
}

	public function cariReklamehasil(){

		// $harga = $this->input->get('price');
		// $nama = $this->input->get('q');
		$kategori = $this->input->post('categories');
		$hasil;
		foreach ($kategori as $value) {
			# code...
			$result = $this->madmin->cariKategoriReklame($value)->result();
			// print_r($result);
			// $result;
		}

	}


}
