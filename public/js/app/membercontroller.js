function MemberController ($scope, $http,Member,Payment, MSG,DateHelper){
	var paymentForm = $("#payment_form");
	var paymentDate = $('#paymentDate');
	var dob = $("#dob");
	var format = 'dd-mm-yyyy';
	paymentDate.datepicker({
		format: format
	});

	dob.datepicker({
		format : format
	});

	$scope.formTitle = "Add Member";
	$scope.members = [];
	
	//this is for payments
	$scope.currencies = [
			{ id:1, name : "GHC"},
			{ id:2, name : "USD"}
	];

	$scope.breakDown = [];

	function getMembers(){
		Member.query(function (res){
			window.x = res
			$scope.members = angular.copy(res);
		});	
	}

	$scope.refreshMembers =  function (){
		getMembers();
	}

	$scope.addMember =  function (newMember){
		if (newMember["id"]){
			Member.update(newMember, function (){
				getMembers();
				$scope.clear();
			});
			
		}else {
			var member =  angular.copy(newMember);
			member["dateOfBirth"] = dob.val();
			var theMember = new Member(member);
			
			theMember.$save(function (){
				//fetch fresh items
				getMembers();
				$scope.clear();
			});
		}
	}

	var getCurById = function (id){
		var result = $scope.currencies.filter(function (n){
			return n.id === id;
		});

		return result[0];
	}

	$scope.generateBreakDown = function (currentPayment){
		var numMonths = currentPayment.numMonths;
		var currency = getCurById(currentPayment.currencyId);
		var totalAmount = currentPayment.totalAmount;

		if(!currency){
			MSG.show("Please select a currency","error");
			return;
		}

		if(!totalAmount || totalAmount <= 0 || !parseInt(totalAmount) ){
			MSG.show("There is something wrong with your total amount");
			return;
		}

		if(!numMonths){
			MSG.show("Please enter a number for the duration of payment","error","Error");
			return;
		}

		var val = $.trim(paymentDate.val());
		if(!val || val===""){
			MSG.show("Please select a payment date");
			return;
		}
		

		DateHelper.init(paymentDate.data().datepicker.date);
		$scope.currentPayment.startDate = paymentDate.data().datepicker.date;
		//clear the breakdown array
		$scope.breakDown = [];
		var i= 0;
		do {
			obj = {
				date :  DateHelper.getCurrentDate(),
				currency : currency.name,
				amount : 0
			}
			$scope.breakDown.push(obj);
			DateHelper.nextDate({month : true})
			i++;
		}while( i < numMonths);
	}

	$scope.makePayment = function (member){
		paymentForm.modal("show");
		$scope.currentPayment = {};
		$scope.currentPayment.memberId = member.id;
		$scope.currentPayment["memberName"] = member.firstName + " " + member.lastName;
		$scope.currentPayment.currencyId  = $scope.currencies[0].id;
		console.log($scope.currentPayment);
		$scope.breakDown = [];
	}

	var computeTotalBreakDown =  function (){
		var total = 0;
		$scope.breakDown.forEach(function (n){
			total += parseInt(n.amount);
		});
		return total; 
	}

	$scope.submitPayment = function (currentPayment){
		var msg = "";
		var sum = computeTotalBreakDown();
		if ( sum !== parseInt( currentPayment.totalAmount)){
			MSG.show("Break Down sums to "+ sum + " which is not equal to total amount of " + currentPayment.totalAmount);
			return;
		}else {
			//$scope.currentPayment.startDate = paymentDate.val();
			var data  = angular.copy(currentPayment);
			data["breakdown"] = $scope.breakDown;
			var payment =  new Payment(data);
			payment.$save( function (res){
				if(res.success){
					msg = res.message || "Payments Saved!";
					MSG.show(msg,"success");
					paymentForm.modal("hide");
					paymentDate.val("");
					$scope.currentPayment = {}
					$scope.breakDown = [];
				}else {
					msg = res.message || "There was a problem saving the transaction. Please Try again";
					MSG.show(msg);
				}
			});
		}
			
	}

	$scope.clear =  function (){
		//$scope.newMember = {};
		//$scope.title = "Add New Member";
		//$scope.statusText = "Add Member";
	}

	//make calls here
	getMembers();
}