function MemberController ($scope, $http,Member, MSG,DateHelper){
	var paymentDate = $('#paymentDate');
	paymentDate.datepicker({
		format: 'dd-mm-yyyy'
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
		var paymentForm = $("#payment_form");
		paymentForm.modal();
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
		//console.log(currentPayment);
		//console.log($scope.breakDown);
		var sum = computeTotalBreakDown();
		if ( sum !== parseInt( currentPayment.totalAmount)){
			MSG.show("Break Down sums to "+ sum + " which is not equal to total amount of " + currentPayment.totalAmount);
			return;
		}else {
			var data  = angular.copy(currentPayment);
			//data["all"] = [{x:20,y:30}];
			data["breakdown"] = $scope.breakDown;
			console.log(data);
			$http.post("payments",data).success( function (res){
				console.log(res);
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