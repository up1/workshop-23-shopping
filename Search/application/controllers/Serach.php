<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index($keyword)
	{
		$this->load->view('welcome_message');
	}
}
