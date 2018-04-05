<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function _echo_json($status, $data=array(), $msg=array(), $is_array = FALSE){
		$a_json = array();
		$a_json['response_code'] = $status;
		if(!empty($msg)){
			$a_json['response_msg'] = $msg;
		}
		$a_json['result'] = (empty($data) ? ($is_array ? array():  new stdClass()) : $data);
		echo json_encode($a_json);

		return $status;
	}
	
}
