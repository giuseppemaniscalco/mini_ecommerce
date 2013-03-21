<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Impressum extends CI_Controller {

	public function index()
	{
		$this->load->library('parser');
		$this->load->view('impressum_page');
        		
	}
	
}
