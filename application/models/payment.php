<?php 
class Payment extends Eloquent {

	public function member(){
		return $this->belongs_to("Member");
	}

	public function user(){
		return $this->belongs_to("User",'created_by');
	}

	public function payment_details(){
		return $this->has_many("Payment_Details");
	}
}