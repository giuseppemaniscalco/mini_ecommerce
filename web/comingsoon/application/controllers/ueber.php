<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ueber extends CI_Controller {

	public function index()
	{
		$this->load->library('parser');
		$this->load->view('ueber_page');
       
		
	}
	
}
