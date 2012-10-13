<?php 
class Payment_Controller extends Base_Controller {

	public $restful  = true;

	public function get_payments (){

	}

	public function  post_payment() {
		$data = Input::json();

		print_r( $data);
	}
}