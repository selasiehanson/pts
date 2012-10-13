function PaymentsController ($scope, Payment){
	$scope.payments = [];

	$scope.refreshPayments =  function (){
		getPayments();
	}

	function getPayments (){
		Payment.query(function (res){
			$scope.payments = res;
		});
	}

	//make initial calls
	getPayments();
}