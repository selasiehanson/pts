<?php 

class Member_Controller extends Base_Controller {

	public $restful = true;

	/**
	 * returns the index page
	 * @return string the index page
	 */
	public function get_index(){
		return View::make("pages.index");
	}

	public function get_members(){
		$members = DB::table("members")->order_by("created_at","asc")->get();

		$out =  array_map(function($data){
			$d = array();
			$d["id"] = $data->id;
		$d["firstName"] = $data->first_name;
			$d["lastName"] = $data->last_name;
			$d["phone"] = $data->phone;
			$d["address"] = $data->address;
			$d["dateOfBirth"] = $data->date_of_birth;
			return $d;
		}, $members);

		return Response::json($out);
	}

	public function post_member(){
		//todo check and make sure that user of looged in else do not allow creation
		$data = Input::json();

		$new_member = array(
			"first_name" => $data->firstName,
			"last_name" => $data->lastName,
			"phone"	=> $data->phone,
			"address" => $data->address,
			"date_of_birth" => $data->dateOfBirth,
			"created_by" => Auth::user()->id
			);

		$rules = array(
			"first_name" => 	"required",
			"last_name" => 	"required",
			"phone"	=> 		"required",
			"address" => 	"required",
			"date_of_birth" => "required",
		);

		$v =  Validator::make($new_member, $rules);
		if($v->fails()){
			$errors = $v;
			return Response::json($errors);
		}

		$member = new Member($new_member);
		$member->save();
		$res = array(
			"message" => "User saved successfully"
		);
		return Response::json($res);
	}

	public function put_member(){

	}

	public function delete_member(){

	}
}