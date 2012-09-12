<?php 
class Member extends Eloquent {
	
	public function payments (){
		return $this->has_many("Payment");
	}

	public function user(){
		return $this->belongs_to("User","created_by");
	}
}