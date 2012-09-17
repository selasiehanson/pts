<?php 

class Member_Controller extends Base_Controller {

	public $restful = true;

	/**
	 * 
	 * @return string the index page
	 */
	public function get_index(){
		return View::make("pages.index");
	}

	public function get_members(){
		$arr  = array(
			"name" => "this works"
		);

		return Response::json($arr);
	}

	public function post_member(){
		//todo check and make sure that user of looged in else do not allow creation
		$new_member = array(
			"firstname" => Input::get("firstname"),
			"lastname" => Input::get("lastname"),
			"phone"	=> Input::get("phone"),
			"address" => Input::get("address"),
			"dateofbirth" => Input::get("dateofbirth"),
			"created_by" => Auth::user()->id
			);

		$rules = array(
			"firstname" => "required",
			"lastname" => "required",
			"phone"	=> "required",
			"address" => "required",
			"dateofbirth" => "required",
		);

		$v =  Validator::make($new_member, $rules);
		if($v->fails()){
			$errors = $v;
			return Response::json($errors);
		}

		$member = new Member($new_member);
		$member->save();
	}

	public function put_member(){

	}

	public function delete_member(){

	}
}