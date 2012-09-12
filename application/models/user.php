<?php 
class User extends Eloquent {

	public function members(){
		return $this->has_many("Member");
	}

	public function payments(){
		return $this->has_many("Payment");
	}
}