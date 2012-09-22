<?php 
class User_Controller extends Base_Controller {
	
	public $restful = true;

	public function get_users(){
		
		$users = DB::table('users')->order_by("created_at","asc")->get();
		
		$out = array_map(function ($data){
			$d = array();
			$d["id"] = $data->id;
			$d["firstName"] = $data->first_name;
			$d["lastName"] = $data->last_name;
			$d["email"] = $data->email;
			$d["userName"] = $data->user_name;
			return $d;			
		}, $users);

		return Response::json( $out);
	}

	public function post_user(){
		//todo check and make sure that user of looged in else do not allow creation
		//
		$data = Input::json();
		$new_user = array(
			"first_name" => $data->firstName,
			"last_name" => $data->lastName,
			"user_name"	=> $data->userName,
			"password" => Hash::make($data->password) ,
			"email" => $data->email
			// "created_by" => Auth::user()->id
		);

		$rules = array(
			"first_name" => "required",
			"last_name" => "required",
			"user_name"	=> "required",
			"password" => "required",
			"email" => "required|email"
		);

		$v =  Validator::make($new_user, $rules);
		if($v->fails()){
			$errors = $v;
			return Response::json($errors);
		}

		$user = new User($new_user);
		$user->save();
		$res = array(
			"message" => "User saved successfully"
		);
		return Response::json($res);
	}

	public function update_user(){
		
	}

	public function delete_user(){
		
	}
}