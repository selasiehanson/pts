<?php 
class Payment_Details extends Eloquent {
	
	public function payment(){
		return $this->belongs_to("Payment");
	}
}