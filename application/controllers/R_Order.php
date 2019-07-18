<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_Order extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf_report');
	}

	public function index()
	{
		
		$this->load->view('laporan/v_order');
	}

}
