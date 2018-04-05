<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function search_product () {
		$keyword = $this->input->get('keyword');

		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $keyword)) {
			return $this->_echo_json('1001', array(), 'invalidate keyword');
		}

		if (!empty($keyword)) {
			$this->load->helper('file');
			$path_json = '../asset/product_keyword.json';
			$product_json = json_decode(file_get_contents(APPPATH.$path_json));
			$product_list = array();
			foreach ($product_json->product as $keyProduct => $product) {
				$a_keyword = explode(',', $product->keyword);
				if (array_search($keyword, $a_keyword) > -1) {
					array_push($product_list, $product->id);
				}
			}
		}

		if(empty($product_list)) {
			return $this->_echo_json('5001', array(), 'not found');
		}
		return $this->_echo_json('200', $product_list, 'success');
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
