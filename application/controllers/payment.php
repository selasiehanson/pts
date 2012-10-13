<?php 
class Payment_Controller extends Base_Controller {

	public $restful  = true;

	public function get_payments (){
		$result = DB::table("payments")
		->join("members","members.id","=","payments.member_id")
		->join("users", "users.id","=","payments.created_by")
		->get(
			array(
					"payments.id" ,"members.first_name", "members.last_name","payments.amount",
					"payments.created_at","payments.duration", "users.first_name as u_fname","users.last_name as u_lname"
				)
			);
		$out = array_map(function ($data){
			$d = array();
			$d["id"] = $data->id;
			$d["firstName"] = $data->first_name;
			$d["lastName"] = $data->last_name;
			$d["amount"] = $data->amount;
			$d["paymentDate"] = $data->created_at;
			$d["numMonths"] = $data->duration;
			$d["createdBy"] = $data->u_fname . " ". $data->u_lname;
			return $d;

		}, $result);
		return Response::json($out);
	}

	public function  post_payment() {
		$data = Input::json();
		$newPayment = array(
			"member_id" => $data->memberId,
			"currency_id" => $data->currencyId,
			"amount" => $data->totalAmount,
			"duration" => $data->numMonths,
			"created_by" => Auth::user()->id
		);

		$break_down = $data->breakdown;

		$res = array();
		//todo validation
		DB::transaction(function () use ($newPayment,$break_down,&$res){
			$payment =  Payment::create ($newPayment);
			
			//lets save in the details of the payment
			foreach ($break_down as $part) {
				$pdt = array(
					"amount" => $part->amount,
					"currency_id" => $payment->currency_id,
					"payment_id" => $payment->id,
					"month" => date($part->date), 
					"created_by" => Auth::user()->id
				);

				Payment_Details::create($pdt);	
			}

			$res["message"] = "Payment Made";
			$res["success"] = true;
			$res["id"] = $payment;
		});

		return Response::json($res);
		
	}
}