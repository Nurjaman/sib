<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__file__).'/tcpdf/tcpdf.php';
class pdf_report extends TCPDF 
{
	protected $ci;

	public function __construct()
	{
		$CI=&get_instance();
	}

}
