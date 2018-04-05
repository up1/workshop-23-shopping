<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index($keyword)
	{
		echo $keyword;
		$this->load->view('welcome_message');
	}

	public function add(){
		$product_id = $this->input->post('product_id');
		$product_name = $this->input->post('product_name');
		$product_detail = $this->input->post('product_detail');

		return $this->_echo_json(200, array(
			'product_id' => $product_id
		), 'Success');
	}

	
}
