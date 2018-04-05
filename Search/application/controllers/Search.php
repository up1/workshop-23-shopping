<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function search () {
		$keyword = $this->input->get('keyword');
		if (!empty($keyword)) {
			$this->load->helper('file');
			// $path_json = BASEPATH;
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
}
