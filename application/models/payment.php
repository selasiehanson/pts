<?php 
class Payment extends Eloquent {

	public function member(){
		return $this->belongs_to("Member");
	}

	public function user(){
		return $this->belongs_to("User",'created_by');
	}
}