<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function search_product () {
		$keyword = $this->input->get('keyword');
		if (!empty($keyword)) {
			$this->load->helper('file');
			// $path_json = ;
			// print_r(APPPATH.'../'.$path_json);die();
			$product_list = array();
			$product_json = file_get_contents('/asset/product_keyword.json');

			foreach ($product_json as $product) {
				$a_keyword = explode($product['keyword'], ',');
				if (array_search($keyword, $a_keyword)) {
					array_push($product_list, $product['id']);
				}
			}
		}
		print_r($product_list);
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
